<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use App\Models\Tiendas;
use App\Models\Productos;

class TiendaController extends Controller
{
    public function listTienda()
    {
        $tiendas = Tiendas::all();
        return view('tiendas/listTiendas', compact('tiendas'));
    }

    public function formTienda()
    {
        return view('tiendas/formTienda');
    }
    public function registerTienda(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required'
        ]);

        $tienda = new Tiendas();
        $tienda->nombre = $request->nombre;
        $tienda->fecha = $request->fecha;

        $tienda->save();

        return redirect()->route('listTienda');
    }

    public function editTienda($id)
    {
        $tiendas = DB::table('tiendas')
            ->where('id', $id)
            ->get();
        return view('tiendas/editTienda', compact('tiendas'));
    }

    public function updateTienda(Request $request, $id)
    {
        $tiendas = Tiendas::find($id);
        $tiendas->id = $id;
        $tiendas->nombre = $request->nombre;
        $tiendas->fecha = $request->fecha;
        $tiendas->save();
        return redirect()->route('listTienda');
    }

    public function listProductosTienda($id)
    {
        $productos = DB::table('productos')
            ->select('productos.id', 'productos.nombre', 'productos.descripcion', 'productos.valor', 'productos.imagen', 'tiendas.nombre as tienda')
            ->leftJoin('tiendas', 'tiendas.id', '=', 'productos.tienda_id')
            ->where('productos.tienda_id', $id)
            ->get();

        return view('tiendas/listProductosTienda', compact('productos', 'id'));
    }

    public function formProducto($id)
    {
        $tiendas = DB::table('tiendas')
            ->select('nombre')
            ->where('id', $id)
            ->get();

        return view('tiendas/formProducto', compact('tiendas', 'id'));
    }
    public function registerProducto(Request $request)
    {

        $extencionArchivo = '';
        $rutaDeArchivo = null;
        $nombreArchivo = '';
        $file = $request->file('imagen');

        if (!is_null($file)) {

            if (!File::exists(public_path() . "/archivos/imagenes")) {
                File::makeDirectory(public_path() . '/archivos/imagenes', 0777, true);
            }
            $rutaArchivo = 'archivos/imagenes';

            $extencionArchivo = $file->getClientOriginalExtension();
            $nameArch = $file->getClientOriginalName();
            $nameArchivo = str_replace(' ', '', $nameArch);
            $file->move($rutaArchivo, $nameArchivo);
            $rutaDeArchivo = '/' . $rutaArchivo . '/' . $nameArchivo;
        }
        $productos = new Productos();
        $productos->nombre = $request->nombre;
        $productos->descripcion = $request->descripcion;
        $productos->valor = $request->valor;
        $productos->tienda_id = $request->id;
        $productos->imagen = $rutaDeArchivo;

        $productos->save();

        return redirect()->route('listProductosTienda', [$request->id]);
    }

    public function editProducto($id)
    {
        $productos = DB::table('productos')
            ->select('productos.tienda_id', 'productos.id', 'productos.nombre', 'productos.descripcion', 'productos.valor', 'productos.imagen', 'tiendas.nombre as tienda')
            ->leftJoin('tiendas', 'tiendas.id', '=', 'productos.tienda_id')
            ->where('productos.id', $id)
            ->get();
        return view('tiendas/editProducto', compact('productos'));
    }

    public function updateProducto(Request $request)
    {
        $extencionArchivo = '';
        $rutaDeArchivo = null;
        $nombreArchivo = '';
        $file = $request->file('imagen');
        if (!is_null($file)) {

            if (!File::exists(public_path() . "/archivos/imagenes")) {
                File::makeDirectory(public_path() . '/archivos/imagenes', 0777, true);
            }
            $rutaArchivo = 'archivos/imagenes';

            $extencionArchivo = $file->getClientOriginalExtension();
            $nameArch = $file->getClientOriginalName();
            $nameArchivo = str_replace(' ', '', $nameArch);
            $file->move($rutaArchivo, $nameArchivo);
            $rutaDeArchivo = '/' . $rutaArchivo . '/' . $nameArchivo;
        }

        $produc = Productos::find($request->id);

        $produc->id = $request->id;
        $produc->nombre = $request->nombre;
        $produc->descripcion = $request->descripcion;
        $produc->valor = $request->valor;
        $produc->tienda_id = $request->tienda_id;
        $produc->imagen =  $rutaDeArchivo;

        $produc->save();

        return redirect()->route('listProductosTienda', [$request->tienda_id]);
    }
}
