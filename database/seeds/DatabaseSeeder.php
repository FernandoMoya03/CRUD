<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Seeder_personas::class);
         $this->call(Seeder_comentarios::class);
         $this->call(Seeder_productos::class);
    }
}
