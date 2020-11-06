@extends('layouts.plantilla')
@section('tittle', 'Home')
@section('content')
    <div class="col-md-12 mt-3">
        <legend>
            Lista de Tiendas
        </legend>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de Apertura</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiendas as $tienda)
                    <tr>
                        <td>{{ $tienda->nombre }}</td>
                        <td>{{ $tienda->fecha }}</td>
                        <td><a href="{{ route('listProductosTienda', $tienda->id) }}" type="button"
                                class="btn btn-primary">Productos</a>
                            <a href="{{ route('editTienda', $tienda->id) }}" type="button"
                                class="btn btn-success">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url('/formTienda') }}" type="button" class="btn btn-primary">Registrar Nueva Tienda</a>
            </div>

        </div>
    </div>

@endsection
