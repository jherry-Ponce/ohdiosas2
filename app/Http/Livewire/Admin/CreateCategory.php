<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class CreateCategory extends Component
{

    use WithFileUploads;

    public $search,$name,$slug,$icon,$image,$modal=false;
    public $category,$modalEdit=false, $brand,$dato=[],$editImage,$brands,$modelo=false,$categoria;
    protected $rules=[
        'name'=>'required',
        'slug'=>'required|unique:categories,slug',
        'icon'=>'required',
        'image'=>'required|image|max:2048',

    ] ;


    protected $validationAttributes=[
        'name'=>'nombre',
        'slug'=>'slug',
        'icon'=>'icono',
        'image'=>'imagen'
    ];
    protected $listeners = ['delete'];
     /* el nombre de la funcion inicia con updated seguido del nombre de la variabre de la que dependera la primera letra en mayuscula */
    public function updatedName($value){
        $this->slug=Str::slug($value);
    }
     
    public function mount(){
        $this->getBrands();
        $this->getCategories();
       /*  */
    }

    public function getBrands(){
        $this->brand = Brand::all();
    }

    public function getCategories(){
        $this->categories = Category::all();
    }

    public function abrirmodal(){
        $this->modal=true;
       
            $this->reset('editImage',
            'name',
            'slug',
            'icon',
            'image');  
        
    }

    public function marcamodal($category){
        
            $this->modelo=!$this->modelo;
            
            $this->categoria=$category;
            

    }


    public function saved(){
        /* $rules=$this->rules; */
        $this->validate();
        $image= $this->image->store('categories');
        
       Category::create([
            'name'=>$this->name,
            'slug'=>$this->slug,
            'icon'=>$this->icon,
            'image'=> $image,

        ]);
        $this->reset();
        $this->getCategories();
        $this->emit('saved');
    }

    public function delete( $category){
        Category::destroy($category);
    }

    public function openmodal($category){
        
       $this->modalEdit = true;
        /* pluck(id)  obtiene los id de las marcas asociadas a categoria*/
        /* almacenamos en dato[] como array por la cantidad de marcas que 
         tiene y sincronizamos con el checkbox para que nos marque las marcas értenecientes */
        $this->category= Category::find($category);
        $this->dato=$this->category->brands->pluck('id');
        $this->name=$this->category->name;
        $this->slug=$this->category->slug;
        $this->icon=$this->category->icon;
        $this->image=$this->category->image; 
        if ($this->modal==false) {
            # code...  
            $this->reset('editImage');  
        }
         
    }

    public function update(){
       /*  $this->validate(); */
      /*   dd($this->dato); */
            if ($this->editImage) {
                Storage::delete($this->category->image);
                $this->category->update([
                    'name'=>$this->name,
                    'slug'=>$this->slug,
                    'icon'=>$this->icon,
                    'image'=> $this->editImage->store('categories'),
                ]);
            }
            else{
                $this->category->update([
                    'name'=>$this->name,
                    'slug'=>$this->slug,
                    'icon'=>$this->icon,
                    'image'=> $this->image,
                ]);
            }
            /* sincrobniza y obtiene los id registrados y los remplaza */
         
            $this->category->brands()->sync($this->dato);
            $this->modalEdit=false;
            $this->reset(
            'name',
            'slug',
            'icon',
            'image');
            $this->getCategories();
    }

    public function status($id){

        $this->orden= Category::where('id',$id)
        ->first();
       
       
        
        switch ($this->orden->status) {
            case '0':
                $this->orden->status='1';
                 $this->orden->save();
                break;
            case '1':
                
                $this->orden->status='0';
                $this->orden->save();
                break;
                            
            default:
                
                break;
        }
 
    }



    public function render()
    {
        $marca= $this->brand; 
     
        /*  dd($marca); */
        $categories=Category::where('name','like','%'. $this->search .'%')->get();
        
        return view('livewire.admin.create-category',compact('categories', 'marca',))->layout('layouts.admin');
    }
}
