@extends('layouts.plantilla')
@section('tittle', 'Home')
@section('content')
    <div class="col-md-12 mt-3">
        <legend>
            Nuevo Producto
        </legend>

        <form class="col-md-5 ml-0 pl-0" role="form" method="POST" action="{{ route('registerProducto') }}"
            enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre de Producto</label>
                        <input type="text" name="nombre" class="form-control" onkeyup="mayus(this);" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor del Producto</label>
                        <input type="text" name="valor" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="imagen">Producto</label>
                        <input type="file" name="imagen" id="imagen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tienda">Tienda</label>
                        @foreach ($tiendas as $tienda)
                            <input type="text" name="tienda" class="form-control" value="{{ $tienda->nombre }}" readonly>
                        @endforeach
                        <input type="hidden" name="id" value="{{ $id }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea type="text" name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <input type="submit" value="registrar" class="btn btn-primary">
                </div>
                <div class="col-md-3">
                    <a href="{{ route('listProductosTienda', $id) }}" type="button" class="btn btn-success">Atrás</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

    </script>
@endsection
