<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Banner;
use Auth;

class HomeController extends Controller
{
    public  function home(){
        
        $sliders = Slider::orderBy('id','desc')->get();
        $banners = Banner::orderBy('id','desc')->get();
        return view('front.pages.home',['sliders'=>$sliders,'banners'=>$banners]);
    }
    public function category($id){
        $category =  Category::find($id);
        if(!is_null($category)){
        return view('front.pages.category.show',['category'=>$category]);
 
        }else{ 
 
         $session()->flash('errors','Sorry !! There is no product by this URL');
        }
     
    
        }
}
