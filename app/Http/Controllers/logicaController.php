<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logicaController extends Controller
{
    public function pruebaLogica()
    {
        return view('pruebaLogica/pruebaLogica');
    }

    public function punto1(Request $request)
    {
        $numero = $request->numero;
        $sumatoria = 0;
        $miArray = array();
        for ($i = 0; $i <= $numero; $i++) {
            if ($i % 3 == 0 || $i % 5 == 0) {
                $miArray[] = $i;
                $suma = array_sum($miArray);
            }
        }
        return $suma;
    }
    public function punto2(Request $request, $string, $capitalizeFirstCharacter = false)
    {

        $string = $request->texto;

        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }
    public function punto3(Request $request)
    {
        $miCadena = $request->texto;
        $miCadenaInvertida = strrev($miCadena);
        return $miCadenaInvertida;
    }
}
