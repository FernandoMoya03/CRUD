<?php

use Illuminate\Database\Seeder;
use App\Modelos\Producto;
class Seeder_productos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Producto();
        $product->NombreProducto = "Boneles";
        $product->save();
        $product1 = new Producto();
        $product1->NombreProducto = "Alitas";
        $product1->save();
        $product2 = new Producto();
        $product2->NombreProducto = "Pay de Limon";
        $product2->save();
        factory(Producto::class, 5)->create();
    }
}
