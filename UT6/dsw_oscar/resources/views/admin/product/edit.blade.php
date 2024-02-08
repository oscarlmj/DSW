@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Crear producto
  </div>
  <div class="card-body">

  <form action="{{ route('admin.product.update', $viewData['product']->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name" class="form-label">Product Name:</label>
        <input type="text" id="name" name="name" value="{{ $viewData['product']->name }}" required class="form-control">

        <label for="description" class="form-label">Description:</label>
        <textarea id="description" name="description" required class="form-control">{{ $viewData['product']->description }}</textarea>

        <label for="price" class="form-label">Price:</label>

        <input type="number" id="price" name="price" value="{{ $viewData['product']->price }}" required class="form-control">

        <!-- Otros campos del formulario -->

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>  </div>
</div>

<div class="card">
  <div class="card-header">
    Mantenimiento de productos
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach ($viewData["products"] as $product)
        <tr>
        <td>{{ $product["id"] }}</td>
        <td>{{ $product["name"] }}</td>
        <td><a href="#">Editar</a></td>
        <td>
          <a href="{{ route('admin.product.destroy', ['id' => $product->id]) }}" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este producto?')) { document.getElementById('eliminar-producto-{{ $product->id }}').submit(); }">Eliminar</a>
          <form id="eliminar-producto-{{ $product->id }}" action="{{ route('admin.product.destroy', ['id' => $product->id]) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
          </form>
        </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error[0] }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection