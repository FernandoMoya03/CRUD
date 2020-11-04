<?php

use Illuminate\Database\Seeder;
use App\Modelos\Persona;
class Seeder_personas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $person = new Persona();
        $person->nombre = "Fernando";
        $person->apellido_pat = "Martinez";
        $person->apellido_mat = "Moya";
        $person->save();
        $person2 = new Persona();
        $person2->nombre = "Eduardo";
        $person2->apellido_pat = "Allegre";
        $person2->apellido_mat = "Rodriguez";
        $person2->save();
        $person3 = new Persona();
        $person3->nombre = "Felipe";
        $person3->apellido_pat = "Muñiz";
        $person3->apellido_mat = "Fonseca";
        $person3->save();
        //Fakers
        factory(Persona::class, 5)->create();
    }
}
