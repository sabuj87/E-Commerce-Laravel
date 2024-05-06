<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($token){
        $user = User::where('remember_token',$token)->first(); 
        if(!is_null($user)){
           $user->status = 1;
    
           $user->remember_token = NULL;
           $user->save();
           session()->flash('success','You are registered successfully ');
           return redirect('/');
        }else{
   
           session()->flash('errors','Sorry !! your token  is not matched');
   
        }
       
   
       }
}
