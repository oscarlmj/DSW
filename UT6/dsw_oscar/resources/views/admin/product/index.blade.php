@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Crear producto
  </div>
  <div class="card-body">

    <form method="POST" action="{{ route('admin.product.add') }}" enctype="multipart/form-data">
      @csrf
      @method('DELETE')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" name="image" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
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