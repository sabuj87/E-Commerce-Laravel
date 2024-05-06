<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Image;

class ProductController extends Controller

{   
     
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    //product index
     public function index(){

      $products = Product::orderBy('id','DESC')->get();
      return view('back.pages.product.products',['products'=>$products]);

   }
    //product create
    public function create(){
       return view('back.pages.product.create');

    }
    //product store
    public function store(Request $request){



        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'categoryid' =>'required|numeric',
            'slug' =>'required'
           

           
        ]);

        $product=new Product;

        $product->title=$request->title;
        $product->price=$request->price;
        $product->category_id=$request->categoryid;
        $product->offer=$request->offer; 
        $product->offerprice=$request->offerprice; 
        $product->brand_id=$request->brandid; 
        $product->seller_id=$request->sellerid; 
        $product->description=$request->description;
        $product->place=$request->place;
        $product->slug=$request->slug;
        $product->admin_id=1; 
        $product->save();
       
         //single image upload

        // if($request->hasFile('image')){

        //     $image=$request->file('image');
        //     $img=time().'.'.$image->getClientOriginalExtension();
        //     $location=public_path('images/products/'.$img);
        //     Image::make($image)->save($location);
        
        //     $product_image =  new ProductImage;
        //     $product_image->product_id=$product->id;
        //     $product_image->image=$img;

        //     $product_image->save();
        // }

              //multiple image upload
         
        if($request->image>0){
            $i=0;
          foreach($request->image as $image){
           // $image=$request->file('image');
            $img=time().$i++.'.'.$image->getClientOriginalExtension();
            $location='image/product/'.$img;
            Image::make($image)->save($location);
        
            $product_image =  new ProductImage;
            $product_image->product_id=$product->id;
            $product_image->image=$img;

            $product_image->save();


          }

        }
        session()->flash('success','Product has deleted successfully');
        return redirect()->route('admin.products');

      
 
     }
    //Product edit
     public function edit($id){
         $product=Product::find($id);

         return view('back.pages.product.edit',['product'=>$product]);

     }

     //Product update

     public function update(Request $request,$id){



      $request->validate([
          'title' => 'required|max:150',
          'des' => 'required',
          'price' => 'required|numeric',
          'categoryid' =>'required',
          'slug' =>'required'
         

         
      ]);

      $product=Product::find($id);

      $product->title=$request->title;
      $product->price=$request->price;
      $product->category_id=$request->categoryid;
      $product->offer=$request->offer; 
      $product->offerprice=$request->offerprice; 
      $product->brand_id=$request->brandid; 
      $product->seller_id=$request->sellerid; 
      $product->description=$request->des;
      $product->slug=$request->slug;
      $product->admin_id=1; 
      $product->save();
     
       //single image upload

      // if($request->hasFile('image')){

      //     $image=$request->file('image');
      //     $img=time().'.'.$image->getClientOriginalExtension();
      //     $location=public_path('images/products/'.$img);
      //     Image::make($image)->save($location);
      
      //     $product_image =  new ProductImage;
      //     $product_image->product_id=$product->id;
      //     $product_image->image=$img;

      //     $product_image->save();
      // }




      


            //multiple image upload
       



        
      if($request->image>0){
        if(!is_null($product)){
   
          foreach($product->images as $img){
  
          
  
        $file_name = $img->image;
          if(file_exists("image/product".$file_name)){
              unlink("image/product".$file_name);
          }
          $img->delete();
  
          }
      
        
  
     }
          $i=0;
        foreach($request->image as $image){
         // $image=$request->file('image');
          $img=time().$i++.'.'.$image->getClientOriginalExtension();
          $location='image/product/'.$img;
          Image::make($image)->save($location);
      
          $product_image =  new ProductImage;
          $product_image->product_id=$product->id;
          $product_image->image=$img;

          $product_image->save();


        }

      }

      session()->flash('success','Product has deleted successfully');
      return redirect()->route('admin.products');
    

   }



   //Product Delete
   public function delete($id){
    $products = Product::find($id);
   if(!is_null($products)){
        $products->delete();
        foreach($products->images as $img){

        

      $file_name = $img->image;
        if(file_exists("images/products".$file_name)){
            unlink("images/products".$file_name);
        }
        $img->delete();

        }
        session()->flash('success','Product has deleted successfully');
         return redirect()->route('admin.products');

   }
}

 }

