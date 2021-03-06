<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProductsController extends Controller
{
    public function index()
    {
        return view('pages.dashboard-products');
    }

    public function detail()
    {
        return view('pages.dashboard-products-detail');
    }

    public function create()
    {
        return view('pages.dashboard-products-create');
    }
}
