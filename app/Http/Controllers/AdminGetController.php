<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Support\Facades\File;

use App\category;

class AdminGetController extends Controller{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        return view('admin');
    }

    public function admin()
    {

        return view('back.admin');

    }
        public function dashboard()
        {


        return view('back.dashboard');

    }

    public function showProduct(){

        $products=Product::all();
        return view('back.products')->with(['products'=>$products]);
    }

    public function addproduct()
    {
            $categories=category::all();

        return view('back.addproduct')->with('categories',$categories);

    }

}


?>