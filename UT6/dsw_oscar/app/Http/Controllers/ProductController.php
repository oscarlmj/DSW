<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\HTTP\Request;

class ProductController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = Producto::all();

        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["product"] = Producto::findOrFail($id);
        return view('product.show')->with("viewData", $viewData);
    }
}