@extends('layouts.plantilla')
@section('tittle', 'Home')
@section('content')
    <div class="col-md-12 mt-3">
        <legend>
            Editar Tienda
        </legend>
        @foreach ($tiendas as $tienda)
            <form class="col-md-5 ml-0 pl-0" role="form" method="POST" action="{{ route('updateTienda', $tienda->id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nombre">Nombre de Tienda</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $tienda->nombre }}"
                        onkeyup="mayus(this)">
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha de Apertura</label>
                    <input type="date" name="fecha" class="form-control" value="{{ $tienda->fecha }}">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="submit" value="registrar" class="btn btn-primary">
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('listTienda') }}" type="button" class="btn btn-success">Atrás</a>
                    </div>
                </div>

            </form>
        @endforeach
    </div>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

    </script>
@endsection
