<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;

//este metodo permite convertir cadenas en slug
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories=[
            [
                'name'=>'Celulares y Tablets',
                'slug'=> Str::slug('Celulares y Tablets'),
                'icon'=>'<i class="fas fa-mobile-alt"></i>'

            ],

            [
                'name'=>'Tv, audio y video',
                'slug'=> Str::slug('Tv, audio y video'),
                'icon'=>'<i class="fas fa-tv"></i>'

            ],

            [
                'name'=>'Consola y videojuegos',
                'slug'=> Str::slug('Consola y videojuegos'),
                'icon'=>'<i class="fas fa-gamepad"></i>'

            ],

            [
                'name'=>'Computacion',
                'slug'=> Str::slug('Computacion'),
                'icon'=>'<i class="fas fa-laptop"></i>'

            ], 

            [
                'name'=>'Moda',
                'slug'=> Str::slug('Moda'),
                'icon'=>'<i class="fas fa-tshirt"></i>'

            ],

        ];

        foreach($categories as $category){
            //metodo first se recupera el primer registro 
           $category= Category::factory(1)->create($category)->first();
           
           //se realiza la creacion de 4 marcas pro cada categoria
           //factory(4) hace la invocacion de brandfactories 
            $brands= Brand::factory(4)->create();
            foreach ($brands as $brand) {
                # code... el metodo attach relacion las tablas para generar una tabla intermedia 
                //tomando los id de las otra dos tablas
                $brand->categories()->attach( $category->id);
            }
        }


    }
}
