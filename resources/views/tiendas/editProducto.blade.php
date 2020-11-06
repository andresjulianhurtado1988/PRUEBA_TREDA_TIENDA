@extends('layouts.plantilla')
@section('tittle', 'Home')
@section('content')
    <div class="col-md-12 mt-3">
        <legend>
            Editar Producto
        </legend>
        @foreach ($productos as $producto)
            <form class="col-md-5 ml-0 pl-0" role="form" method="POST" action="{{ route('updateProducto') }}"enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <div class="form-group">
                    <input type="hidden" name="id" value=" {{ $producto->id }}">
                    <label for="nombre">Nombre de Producto</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}"
                        onkeyup="mayus(this)" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea type="text" name="descripcion" class="form-control"
                        required>{{ $producto->descripcion }}</textarea>
                </div>
                <div class="form-group">
                    <label for="nombre">Valor</label>
                    <input type="text" name="valor" class="form-control" required value="{{ $producto->valor }}">
                </div>
                <div class="form-group">
                    <label for="tienda">Tienda</label>
                    <input type="text" name="tienda" class="form-control" value="{{ $producto->tienda }}" readonly>
                    <input type="hidden" name="tienda_id" value="{{ $producto->tienda_id }}">
                </div>
                <div class="form-group">
                    <label for="imagen">Producto</label>
                    <input type="file" name="imagen" class="form-control" value="{{ $producto->imagen }}">
                </div>
                <input type="submit" value="registrar" class="btn btn-success">
            </form>
        @endforeach
    </div>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

    </script>
@endsection
