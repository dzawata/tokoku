@extends('layouts.admin')

@section('title', 'List Categories')

@section('content')

<!-- Modal -->
<div class="modal fade" id="modalCrud" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form class="form-category">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-save">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Categories</h2>
            <p class="dashboard-subtitle">
                List Categories
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="javascript:void(0)" class="btn btn-info mb-3 btn-add">+ Tambah Kategori</a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Name</td>
                                            <td>Image</td>
                                            <td>Slug</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>

                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    var table = $('#crudTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "ajax": {
            "url": '{!! url()->current() !!}'
        },
        "columns": [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'images',
                name: 'image'
            },
            {
                data: 'slug',
                name: 'slug'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '15%'
            }
        ]
    });

    jQuery(".btn-add").on('click', function() {
        var modal = jQuery("#modalCrud");
        jQuery.ajax({
            'url': "{!! route('category.create') !!}",
            'method': 'GET',
            'dataType': 'json',
            'success': function(ret) {
                modal.find('.alert').remove();
                modal.find('.modal-title').html('Tambah Kategori');
                modal.find(".form-category").attr('action', ret.html.action);
                modal.find(".modal-body").html(ret.html.fields);
            }
        })

        modal.appendTo('body');
        modal.modal('show');
    })

    jQuery(".form-category").submit(function(e) {
        e.preventDefault();

        var modal = jQuery("#modalCrud");
        var data = new FormData(this);
        jQuery.ajax({
                'headers': {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                'url': jQuery(".form-category").attr('action'),
                'method': 'POST',
                'enctype': 'multipart/form-data',
                'data': data,
                'cache': false,
                'contentType': false,
                'processData': false,
                'success': function(ret) {
                    modal.find('.alert').remove();
                    if (ret.status) {
                        var msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> </br>' + ret.message + ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button></div>';
                        table.ajax.reload();
                    } else {
                        var msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> </br>' + ret.message + ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button></div>';
                    }

                    jQuery(msg).insertBefore('.modal-body');
                }
            })
            .fail(function(ret) {
                modal.find('.alert').remove();

                var errLists = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
                var errors = ret.responseJSON.errors;
                Object.values(errors).forEach(function(error, index) {
                    errLists += '<li>' + error[0] + '</li>';
                });
                errLists += '</ul>';
                errLists += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                errLists += '<span aria-hidden="true">&times;</span></button></div>';
                jQuery(errLists).insertBefore('.modal-body');
            })
    })
</script>
@endpush