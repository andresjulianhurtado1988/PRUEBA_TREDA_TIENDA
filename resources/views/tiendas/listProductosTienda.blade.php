@extends('layouts.plantilla')
@section('tittle', 'Home')
@section('content')
    <legend>
        Lista de Productos
    </legend>
    <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Valor</th>
                <th scope="col">Tienda</th>
                <th scope="col">Producto</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->valor }}<span>$</span></td>
                    <td>{{ $producto->tienda }}</td>
                    <td><img src="{{ URL::asset($producto->imagen) }}" style="height:50px"></td>
                    <td> <a href="{{ route('editProducto', $producto->id) }}" type="button"
                            class="btn btn-success">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-3">
            <a href="{{ route('formProducto', $id) }}" type="button" class="btn btn-primary">Nuevo Producto</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('listTienda') }}" type="button" class="btn btn-success">Atrás</a>
        </div>
    </div>

@endsection
