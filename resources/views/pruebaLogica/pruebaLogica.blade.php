@extends('layouts.plantilla')
@section('tittle', 'Home')
@section('content')

    <legend>
        Prueba de Lógica
    </legend>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form class="col-md-5 ml-0 pl-0" role="form" method="POST" action="{{ route('punto1') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <legend>
                            Prueba 1
                        </legend>
                        <label for="numero">Ingresar Número</label>
                        <input type="number" name="numero" class="form-control" min="1">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form class="col-md-5 ml-0 pl-0" role="form" method="POST" action="{{ route('punto2') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <legend>
                            Prueba 2
                        </legend>
                        <label for="texto">Ingresar Texto</label>
                        <input type="text" name="texto" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form class="col-md-5 ml-0 pl-0" role="form" method="POST" action="{{ route('punto3') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <legend>
                            Prueba 3
                        </legend>
                        <label for="texto">Ingresar Texto</label>
                        <input type="text" name="texto" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <a href="{{ url('/listTienda') }}" type="button" class="btn btn-success">Atrás</a>
            </div>
        </div>
    </div>

@endsection
