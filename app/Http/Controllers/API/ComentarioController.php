<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Comentario;

class ComentarioController extends Controller
{
    public function index($id = null)
    {
        if($id)
        return response()->json(["comentario"=>Comentario::find($id)],200);
        return response()->json(["comentarios"=>Comentario::all()],200);
    }
    public function guardar(Request $request)
    {
        $comentario = new Comentario();
        $comentario->comentario = $request->comentario;
        $comentario->producto_id = $request->producto_id;
        $comentario->persona_id = $request->persona_id;
        if($comentario->save())
        return response()->json(['messeage' => 'Registro guardado correctamente'],200);
        return response()->json(null,400);
    }
    public function destroy($id)
    {
       Comentario::destroy($id);
       return response()->json(['res' => true, 'messeage' => 'Registro eliminado correctamente'],200);
    }
    public function update(Request $request, $id)
    {
        $update = new Comentario();
        $update = Comentario::find($id);
        $update -> comentario = $request->get('comentario');
        $update -> producto_id = $request->get('producto_id');
        $update -> persona_id = $request->get('producto_id');
        $update->save();
        return response()->json(['res' => true, 'messeage' => 'Registro modificado correctamente'],200);
    }
}
