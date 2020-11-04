<?php

use Illuminate\Database\Seeder;
use App\Modelos\Comentario;
class Seeder_comentarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $coment = new Comentario();
        $coment-> comentario = "demasiado grasoso";
        $coment-> persona_id = "1";
        $coment-> producto_id = "1";
        $coment->save();
        $coment1 = new Comentario();
        $coment1-> comentario = "demasiado acido";
        $coment1-> persona_id = "2";
        $coment1-> producto_id = "1";
        $coment1->save();
        $coment2 = new Comentario();
        $coment2-> comentario = "demasiado azucarado";
        $coment2-> persona_id = "2";
        $coment2-> producto_id = "3";
        $coment2->save();
        
        factory(Comentario::class, 5)->create();
    }
}
