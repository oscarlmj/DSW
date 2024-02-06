<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Página de administración - Tienda online";
        $viewData["products"] = Product::all();


        return view('admin.home.index')->with("viewData", $viewData);
    }
}