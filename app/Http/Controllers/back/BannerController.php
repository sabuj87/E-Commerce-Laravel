<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;
use File;
class BannerController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function banners(){
        $banners = Banner::orderBy('id','desc')->get();
        return view('back.pages.banner.banners',['banners'=>$banners]);

    } 
    

 

    public function store(Request $request){
        $request->validate(
            [
            'title' => 'required|max:150',
            'image' => 'image',
            'priority' => 'required',
            'position' => 'required',
            'type' => 'required',
            'button_link' => 'nullable|url',
    

           
            ],
        [


            'title.required' => 'Plz Provied a Title',
            'image.image' => 'Plz Provied valid image',
            
           
           

           
        ]
    
    
    
    );
        $banner=new Banner;

        $banner->title=$request->title;
        $banner->priority=$request->priority;
        $banner->position=$request->position;
        $banner->type=$request->type;
        $banner->button_link=$request->button_link;
        $banner->button_text=$request->button_text;
 
  
        $banner->save();
 



        if($request->hasFile('image')){

            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/banner/'.$img;
            Image::make($image)->save($location);
        
        
            $banner->image=$img;

            $banner->save();
        }


        return redirect()->route('admin.banners');



    }

    
    public function update(Request $request,$id){
        $request->validate(
            [
            'title' => 'required|max:150',
            'image' => 'image',
            'priority' => 'required',
            'position' => 'required',
            'type' => 'required',
            'button_link' => 'nullable|url',
    

           
            ],
        [


            'title.required' => 'Plz Provied a Title',
            'image.image' => 'Plz Provied valid image',
            
           
           

           
        ]
    
    
    
    );
        $banner=Banner::find($id);

        $banner->title=$request->title;
        $banner->priority=$request->priority;
        $banner->position=$request->position;
        $banner->type=$request->type;
        $banner->button_link=$request->button_link;
        $banner->button_text=$request->button_text;
 
  
        $banner->save();
 



        if($request->hasFile('image')){
            if(File::exists('images/banner/'. $banner->image)){

                File::delete('images/banner/'. $banner->image);
    
            }
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/banner/'.$img;
            Image::make($image)->save($location);
        
        
            $banner->image=$img;

            $banner->save();
        }


        return redirect()->route('admin.banners');


    
}
    public function delete($id){
        $banner = Banner::find($id);

        if(!is_null($banner)){

            if(File::exists('images/banner/'. $banner->image)){

                File::delete('images/banner/'. $banner->image);
    
            }
                $banner->delete();
    
    
                session()->flash('success','Slider has deleted successfully');
                 return redirect()->route('admin.banners');
    

        }
  
       
    }
}
