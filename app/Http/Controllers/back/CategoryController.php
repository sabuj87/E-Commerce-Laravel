<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use File;

class CategoryController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function categories(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.pages.category.categories',['categories'=>$categories]);

    } 


    public function manage(){
        $categories = Category::orderBy('name','desc')->get();

        return view("back.pages.category.manage",['categories'=>$categories]);

    } 

    public function edit($id){
       
            $categorys = Category::find($id);
            $categories = Category::orderBy('name','desc')->get();
            
            return view("back.pages.category.edit",['categorys'=>$categorys,'categories'=>$categories]);

        
     
    }


    public function store(Request $request){
        $request->validate(
            [
            'name' => 'required|max:150',
           
            ],
        [


            'name.required' => 'Please Provied name',
            'catimage.image' => 'Please Provied valid image',
            
           
           

           
        ]
    
    
    
    );
        $category=new Category;

        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parentid;
        $category->show_homepage=$request->show_homepage;
        $category->save();

      

        if($request->hasFile('image')){

            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/category/'.$img;
            Image::make($image)->save($location);
            $category->image=$img;
            $category->save();
     
        }

        //       //multiple image upload

        // if(count($request->catimage)>0){
     
        //   foreach($request->catimage as $image){
        //    // $image=$request->file('image');
        //     $img=time().'.'.$image->getClientOriginalExtension();
        //     $location=public_path('image/category/'.$img);
        //     Image::make($image)->save($location);
        //     $category->image=$img;
 
          

        //     $category->save();


        //   }

        // }
        return back();

    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:150',
           
           
        ]);
        $category=Category::find($id);

        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parentid;
       
 

        $category->save();

         //single image upload

        if($request->hasFile('image')){

            if(File::exists('image/category/'. $category->image)){

                File::delete('image/category/'. $category->image);

         }

            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/category/'.$img;
            Image::make($image)->save($location);

            $category->image=$img;
            $category->save();
       
        }

         
        return back();
    }
    public function delete(Request $request,$id){
        $category = Category::find($id);
       if(!is_null($category)){
            if($category->parent_id == NULL){
        
              $subcat= Category::orderBy('name','desc')->where('parent_id',$category->id)->get();
              foreach($subcat as $sub){
               
                if(File::exists('image/category/'. $sub->image)){

                    File::delete('image/category/'. $sub->image);
 
             }
                $sub->delete();

              }
             }

            
            if(File::exists('image/category/'. $category->image)){

                File::delete('image/category/'. $category->image);

         }
            $category->delete();

            session()->flash('success','Category has deleted successfully');
             return redirect(route('admin.category.manage'));
    }
}
}