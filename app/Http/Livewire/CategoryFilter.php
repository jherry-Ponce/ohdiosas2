<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

/* sirve para la paginacion dinamica */
use Livewire\WithPagination;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategoria, $marca;

    public $view = "grid";

    /* permite agregar lael no mbre a la url */
    protected $queryString = ['subcategoria', 'marca'];

    public function limpiar(){
        //reset->resetea lo que se ingresa
        $this->reset(['subcategoria', 'marca', 'page']);
    }

    public function updatedSubcategoria(){
        $this->reset('page');
    }

    public function updatedMarca(){
        $this->resetPage();
    }

    public function render()
    {

        /* $products = $this->category->products()
                            ->where('status', 2)->paginate(20); */
                            
                            /* creacion de la consulta el metodo query() define que se tarta de una consulta y asi no lo tomaq como coleccion*/
        $productsQuery = Product::query()->Where('status',2)->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
            
        });

      
        if ($this->subcategoria) {
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('slug', $this->subcategoria);
               
            });
        }

        if ($this->marca) {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }

        /* creacion de la coleccion */
        $products = $productsQuery->paginate(10);

        return view('livewire.category-filter', compact('products'));
    }
}
