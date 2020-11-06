@extends('layouts.plantilla')
@section('tittle', 'Home')
@section('content')
    <div class="col-md-12 mt-3">
        <legend>
            Nuevo Producto
        </legend>

        <form class="col-md-5 ml-0 pl-0" role="form" method="POST" action="{{ route('registerProducto') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nombre">Nombre de Producto</label>
                <input type="text" name="nombre" class="form-control" onkeyup="mayus(this);" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea type="text" name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="valor">Valor del Producto</label>
                <input type="text" name="valor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tienda">Nombre de la Tienda</label>
                @foreach ($tiendas as $tienda)
                    <input type="text" name="tienda" class="form-control" value="{{ $tienda->nombre }}" readonly>
                @endforeach
                <input type="hidden" name="id" value="{{ $id }}">
            </div>
            <div class="form-group">
                <label for="imagen">Producto</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            <input type="submit" value="registrar" class="btn btn-success">
        </form>
    </div>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

    </script>
@endsection
