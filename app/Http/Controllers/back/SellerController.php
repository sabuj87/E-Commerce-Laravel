<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use File;
use Image;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function brands(){
        $brands = Brand::orderBy('id','desc')->get();
        return view('admin.pages.brand.brands',['brands'=>$brands]);

    } 
    public function manage(){
        $sellers = Seller::orderBy('name','desc')->get();

        return view("back.pages.seller.manage",['sellers'=>$sellers]);

    } 

    public function edit($id){
        $seller = Seller::find($id);
        $sellers = Seller::orderBy('name','desc')->get();
        return view('back.pages.seller.edit',['seller'=>$seller,'sellers'=>$sellers]);

    }


    public function store(Request $request){
        $request->validate(
            [
            'name' => 'required|max:150',
        

           
            ],
        [


            'name.required' => 'Please Provied name',
            'sellerimage.image' => 'Plz Provied valid image',
            
           
           

           
        ]
    
    
    
    );
        $seller=new Seller;
        $seller->name=$request->name;
        $seller->description=$request->description;
        $seller->address=$request->address;
        $seller->save();

         //single image upload

        if($request->hasFile('image')){

            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/seller/'.$img;
            Image::make($image)->save($location);
            $seller->image=$img;
            $seller->save();

           
        }

      
        return redirect()->route('admin.seller.manage');

    }
    public function update(Request $request,$id){
        $request->validate(
            [
            'name' => 'required|max:150',
        

           
            ],
        [


            'name.required' => 'Please Provied name',
            'sellerimage.image' => 'Plz Provied valid image',
            
           
           

           
        ]
    
    
    
    );
        $seller=Seller::find($id);
        $seller->name=$request->name;
        $seller->description=$request->description;
        $seller->address=$request->address;
        $seller->save();

         //single image upload

        if($request->hasFile('image')){
                   
            if(File::exists('image/seller/'. $seller->image)){

                File::delete('image/seller/'. $seller->image);
            }
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/seller/'.$img;
            Image::make($image)->save($location);
            $seller->image=$img;
            $seller->save();

           
        }

      
        return redirect()->route('admin.seller.manage');
    }




    public function delete($id){
        $seller = Seller::find($id);
       if(!is_null($seller)){
        

            
            if(File::exists('image/seller/'. $seller->image)){

                File::delete('image/seller/'. $seller->image);

         }
            $seller->delete();

         
             return redirect()->route('admin.seller.manage');

       }
    }
}
