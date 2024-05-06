<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\models\Product;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->search;
        $categoryid = $request->categoryid;
        if(!is_null($categoryid) and  !is_null($search) ){

            $products=Product::where('category_id',$categoryid)
            ->where(function ($query) use($search)  {
            $query->where('title','like','%'.$search.'%')
                  ->orWhere('description','like','%'.$search.'%');
            })
           
            ->orderBy('id','desc')
            ->get();


            return view('front.pages.search.show',['products'=>$products,'search'=>$search]);
     


           }elseif(!is_null($search)){

            $products=Product::orWhere('title','like','%'.$search.'%')
                          ->orWhere('description','like','%'.$search.'%')
                          ->orderBy('id','desc')->get();
    
    
                return view('front.pages.search.show',['products'=>$products,'search'=>$search]);
         

           }else{
               return back();
           }

        }
   
 
    
}
