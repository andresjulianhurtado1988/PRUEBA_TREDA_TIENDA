@extends('layouts.plantilla')
@section('tittle', 'Home')
@section('content')
    <div class="col-md-12 mt-3">
        <legend>
            Lista de Productos
        </legend>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Tienda</th>
                    <th scope="col">Producto</th>

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
                <a href="{{ route('formProducto', $id) }}" type="button" class="btn btn-primary">Registrar
                    Nueva Producto</a>
            </div>

        </div>
    </div>

@endsection
