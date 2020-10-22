<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Producto;

class ProductoController extends Controller
{
    public function index($id = null)
    {
        if($id)
        return response()->json(["producto"=>Producto::find($id)],200);
        return response()->json(["productos"=>Producto::all()],200);
    }
    public function guardar(Request $request)
    {
        $producto = new Producto();
        $producto->NombreProducto = $request->NombreProducto;
        $producto->comentario = $request->comentario;
        if($comentario->save())
        return response()->json(["producto"=>$producto],201);
        return response()->json(null,400);
    }
    public function destroy($id)
    {
       Producto::destroy($id);
       return response()->json(['res' => true, 'messeage' => 'Registro eliminado correctamente'],200);
    }
    /*
    public function update(Request $request, $id)
    {
        $update = new Producto();
        $update = Producto::find($id);
        $update -> nombre = $request->get('nombre');
        $update -> apellido_pat = $request->get('apellido_pat');
        $update -> apellido_mat = $request->get('apellido_mat');
        $update->save();
        return response()->json(['res' => true, 'messeage' => 'Registro modificado correctamente'],200);
    }*/
}
