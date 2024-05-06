<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use File;
use Image;

class BrandController extends Controller
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
        $brands = Brand::orderBy('name','desc')->get();

        return view("back.pages.brand.manage",['brands'=>$brands]);

    } 

    public function edit($id){
        $brand = Brand::find($id);
        $brands = Brand::orderBy('name','desc')->get();
        return view('back.pages.brand.edit',['brand'=>$brand,'brands'=>$brands]);

    }


    public function store(Request $request){
        $request->validate(
            [
            'name' => 'required|max:150',
        

           
            ],
        [


            'name.required' => 'Please Provied name',
            'brandimage.image' => 'Plz Provied valid image',
            
           
           

           
        ]
    
    
    
    );
        $brand=new Brand;
        $brand->name=$request->name;
        $brand->description=$request->description;
        $brand->country=$request->country;
        $brand->save();

         //single image upload

        if($request->hasFile('image')){

            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/brand/'.$img;
            Image::make($image)->save($location);
            $brand->image=$img;
            $brand->save();

           
        }

      
        return redirect()->route('admin.brand.manage');

    }
    public function update(Request $request,$id){
        $request->validate(
            [
            'name' => 'required|max:150',
        

           
            ],
        [


            'name.required' => 'Please Provied name',
            'brandimage.image' => 'Plz Provied valid image',
            
           
           

           
        ]
    
    
    
    );
        $brand=Brand::find($id);
        $brand->name=$request->name;
        $brand->description=$request->description;
        $brand->country=$request->country;
        $brand->save();

         //single image upload

        if($request->hasFile('image')){
            if(File::exists('image/brand/'. $brand->image)){

                File::delete('image/brand/'. $brand->image);

         }
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/brand/'.$img;
            Image::make($image)->save($location);
            $brand->image=$img;
            $brand->save();

           
        }

      
        return redirect()->route('admin.brand.manage');
    }



    public function delete($id){
        $brand = Brand::find($id);
       if(!is_null($brand)){
        

            
            if(File::exists('image/brand/'. $brand->image)){

                File::delete('image/brand/'. $brand->image);

         }
            $brand->delete();

         
             return redirect()->route('admin.brand.manage');

       }
    }
}
