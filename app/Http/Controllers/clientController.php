<?php
namespace App\Http\Controllers;

use App\Models\admin\Category;
use App\Models\admin\Gallery;
use App\Models\admin\Menu;
use App\Models\admin\Page;
use App\Models\admin\Picgallery;
use App\Models\admin\Picture;
use App\Models\admin\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class clientController extends Controller
{
    public function vl()
    {
        return (['menus' => Menu::all(), 'cats'=> Category::all(),'cat'=> Category::all(), 'products' => Product::all(),'picgalleries' => Picgallery::all()]);


    }
    public function index(){
        $this->vl();
        return view('web.client', $this->vl());
    }
    public function details($id){
        return view('web.productdetails',$this->vl() , ['product_this'=>Product::where('id',$id)->get()]);
    }
    public function profile_client($id){
        if (auth()->user()){
            return Storage::download(auth()->user()->profile_picture);
        }
    }
}

