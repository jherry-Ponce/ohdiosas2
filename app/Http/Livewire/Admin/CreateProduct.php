<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class CreateProduct extends Component
{
    public $categories, $subcategories=[];
    public $category_id="",$subcategory_id="";
    public $name,$slug,$description,$priceV,$quantity,$priceC,$tasa,$priceF,$min ;
  

    protected $rules=[
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'name' => 'required',
        'slug' => 'required|unique:products',
        'description' => 'required',
        'priceV' => 'required',
        'priceC' => 'required',
        
        
    ];

    public function mount(){
        $this->categories= Category::all();
        
    }

    /* updatedCategoryId esta funcion permite actualizar kas subcaterias(es necesario escribirlob tal y como etsa)  */
    public function updatedCategoryId($value){
        $this->subcategories=Subcategory::where('category_id',$value)->get(); 
        $this->reset('subcategory_id');
    }

    
    public function updatedName($value){
        $this->slug=Str::slug($value);
    }

    /* propiedad computada trae el objeto subcategory dependiendo de lo que se definio en la variable subcategory_id */
    public function getSubcategoryProperty(){
        return Subcategory::find($this->subcategory_id);
    }
    public function save(){

        $rules=$this->rules;

        if ($this->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $rules['quantity']='required';
                $rules['min']='required';
            }
        }
        $this->validate($rules);

        $product = new Product();
     /*   dd( $product );  */
        $product->name= $this->name;
        $product->slug=$this->slug;
        $product->description=$this->description;
        $product->subcategory_id=$this->subcategory_id;
        $product->brand_id='1';
        $product->priceV=$this->priceV;
        $product->priceC=$this->priceF;
       /*  $product->SKU=; */
        if ($this->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $product->quantity=$this->quantity;
                $product->cantmin=$this->min;
            }
        }
        $product->save();
       /*  dd( $product); */
        return redirect()->route('admin.products.edit',$product);
    }
    public function render()
    {
        $this->priceF=$this->priceC*$this->tasa;
        return view('livewire.admin.create-product')->layout('layouts.admin');
    }
}
