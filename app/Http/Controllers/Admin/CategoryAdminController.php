<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Controllers\Controller;
use Exception;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {

            $query = Category::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="btn btn-group">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle mr-1 mb-1" 
                                    type="button" 
                                    data-toggle="dropdown">
                                        Aksi
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item btn-edit" data-id="' . $item->id . '" href="javascript:void(0)">Edit</a>
                                        <form action="' . route('category.destroy', $item->id) . '" method="POST">
                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ';
                })
                ->editColumn('images', function ($item) {
                    return $item->images ? '<img src="' . Storage::url($item->images) . '" style="max-height:40px">' : '';
                })
                ->rawColumns(['action', 'images'])
                ->make();
        }

        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html =
            [
                'fields' => '
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" id="image" name="image" class="form-control" required>
                                    </div>
                                </div>    
                            </div>
                    </div>
                </div>',
                'action' => route('category.store')
            ];
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $response = [
            'status' => false,
            'message' => 'Data gagal tersimpan, Kategori "' . $request->name . '" sudah ada.'
        ];

        $check = Category::where('slug', Str::slug($request->name))->first();
        if (is_null($check)) {
            try {
                $data = $request->all();
                $data['slug'] = Str::slug($request->name);
                $data['images'] = $request->file('image')->store('assets/category', 'public');
                Category::create($data);

                $response = [
                    'status' => true,
                    'message' => 'Data tersimpan'
                ];
            } catch (Exception $e) {
                $response = [
                    'status' => false,
                    'message' => $e->getMessage()
                ];
            }
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = trim($id);
        $category = Category::findOrFail($id);
        $html =
            [
                'fields' => '
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" id="name" name="name" class="form-control" value="' . $category['name'] . '" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                </div>    
                            </div>
                    </div>
                </div>',
                'action' => route('category.update', $id) . "?_method=PUT"
            ];
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $response = [
            'status' => false,
            'message' => 'Data gagal tersimpan, Data tidak ditemukan.'
        ];
        $category = Category::findOrFail($id);
        if (!is_null($category)) {
            try {
                $data = $request->all();
                $data['slug'] = Str::slug($request->name);
                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    Storage::disk("public")->delete($category['images']);
                    $data['images'] = $request->file('image')->store('assets/category', 'public');
                }
                $category->update($data);
                $response = [
                    'status' => true,
                    'message' => 'Data tersimpan'
                ];
            } catch (Exception $e) {
                $response = [
                    'status' => false,
                    'message' => $e->getMessage()
                ];
            }
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
