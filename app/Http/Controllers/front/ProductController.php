<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth;
use Image;

class ProductController extends Controller
{
    public function products(){
        $products = Product::orderBy('id','desc')->paginate(2);
        return view('pages.product.index',['products'=>$products]);
   
       }
    
   
   
       public function index(){
   
           $sliders=Slider::orderBy('id','desc')->get();
           $products = Product::orderBy('id','desc')->paginate(4);
           return view('home',['products'=>$products,'sliders'=>$sliders]);
      
          }
          public function search(Request $request){
              $search = $request->search;
              $products = Product ::orWhere('title','like','%'.$search.'%')
              ->orWhere('description','like','%'.$search.'%')
              ->orderBy('id','desc')->paginate(2);
              return view('pages.product.search',['products'=>$products]);
       
          }
   
          public function show($slug){
              $product = Product :: where('slug',$slug)->first();
              if(!is_null($product)){
   
                       return view('front.pages.products.productview',['product'=>$product]);
   
              }else{
                  
                  $session()->flash('errors','Sorry !! There is no product by this URL');
                  return redirect()->route('products');
   
              }
   
          }
   
          public function category($id){
          $category =  Category::find($id);
          if(!is_null($category)){
          return view('front.pages.category.show',['category'=>$category]);
   
          }else{
   
           session()->flash('errors','Sorry !! There is no product by this URL');
          }
       
      














          
          }
          public function reviewstore(Request $request){
            $this->validate($request,[
                'details' => 'required',
               
               
     
             ]);
             if(Auth::check()){
               $review=new Review();

               $review->user_id = Auth::id();
               $review->product_id =$request->product_id;
               $review->details =$request->details;
               $review->save();

      

               if($request->hasFile('image')){
       
                   $image=$request->file('image');
                   $img=time().'.'.$image->getClientOriginalExtension();
                   $location='image/review/'.$img;
                   Image::make($image)->save($location);
                   $review->image=$img;
                   $review->save();
            


             }
             session()->flash('success','Review stored !');
             return back();

          }
        }

          public function reviewdelete($id,$uid){
            if(Auth::check()){
                if(Auth::id()== $uid){
                    $review=Review::find($id);

                    if(!is_null($review)){
                        $review->delete();
                        return back();
                    }

                }
            }
              
        }
}
