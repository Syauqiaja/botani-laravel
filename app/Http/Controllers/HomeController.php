<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function createProduct()
    {
        return view('Toko.create-product');
    }
    public function editProduct()
    {
        return view('Toko.edit-product');
    }
    public function createPesanan()
    {
        return view('User.create-pemesanan');
    }
    public function showProduct()
    {
        return view('Toko.dashboard-shop');
    }
}
