<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use File;

class SliderController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function sliders(){
        $sliders = Slider::orderBy('id','desc')->get();
        return view('back.pages.slider.sliders',['sliders'=>$sliders]);

    } 
    

 

    public function store(Request $request){
        $request->validate(
            [
            'title' => 'required|max:150',
            'image' => 'required',
            'priority' => 'required',
            'button_link' => 'nullable|url',
    

           
            ],
        [


            'title.required' => 'Plz Provied a Title',
            'image.image' => 'Plz Provied valid image',
            
           
           

           
        ]
    
    
    
    );
        $slider=new Slider;

        $slider->title=$request->title;
        $slider->priority=$request->priority;
        $slider->button_link=$request->button_link;
        $slider->button_text=$request->button_text;
 
  
        $slider->save();
 



        if($request->hasFile('image')){

            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/slider/'.$img;
            Image::make($image)->save($location);
        
        
            $slider->image=$img;

            $slider->save();
        }


        return redirect()->route('admin.sliders');



    }

    
    public function update(Request $request,$id){
        $request->validate(
            [
            'title' => 'required|max:150',
            'image' => 'image',
            'priority' => 'required',
            'button_link' => 'nullable|url',
    

           
            ],
        [


            'title.required' => 'Plz Provied a Title',
            'image.image' => 'Plz Provied valid image',
            
           
           

           
        ]
    
    
    
    );
    $slider=Slider::find($id);

        $slider->title=$request->title;
        $slider->priority=$request->priority;
        $slider->button_link=$request->button_link;
        $slider->button_text=$request->button_text;
 

        $slider->save();

        
       
        if($request->hasFile('image')){

            if(File::exists('image/slider/'. $slider->image)){

                File::delete('image/slider/'. $slider->image);

         }

            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location='image/slider/'.$img;
            Image::make($image)->save($location);
        
        
            $slider->image=$img;

            $slider->save();
        }



        return redirect()->route('admin.sliders');







    
}
    public function delete($id){
        $slider = Slider::find($id);

        if(!is_null($slider)){

            if(File::exists('images/slider/'. $slider->image)){

                File::delete('images/slider/'. $slider->image);
    
            }
                $slider->delete();
    
    
                session()->flash('success','Slider has deleted successfully');
                 return redirect()->route('admin.sliders');
    

        }
  
       
    }
}
