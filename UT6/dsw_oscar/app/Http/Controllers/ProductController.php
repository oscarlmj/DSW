<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        $viewData = [];
        $viewData["title"] = "Página principal - Tienda online";

        return view("home.index")->with("viewData", $viewData);
    }

    // Controlador de la página "Acerca de"
    public function about() {
        $viewData = [];
        $viewData["title"] = "Acerca de - Tienda Online";
        $viewData["subtitle"] =  "Acerca de";
        $viewData["description"] =  "Esta es la página acerca de ...";
        $viewData["author"] = "Desarrollado por: DSW";

        return view("home.about")->with("viewData", $viewData);
    }

    public function products(){
        $viewData = [];

        $viewData["title"] = "Lista de productos";
        $viewData["subtitle"] =  "Listado de productos";
        $viewData["description"] =  "Este es el listado de productos";
        $viewData["author"] = "Desarrollado por: DSW";

        return view("home.products")->with("viewData", $viewData);
    }
}
=======
use App\Models\Producto;
use Illuminate\HTTP\Request;


class ProductController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Productos";
        $viewData["subtitle"] =  "Listado de productos";
        $viewData["products"] = Producto::all();

        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $viewData["title"] = "Productos";
        $viewData["subtitle"] =  "Detalle de producto";
        $viewData["product"] = Producto::findOrFail($id);
        return view('product.show')->with("viewData", $viewData);
    }
}
>>>>>>> 8b0a46797a34f8ba03618962800db0daaaa6c5b7
