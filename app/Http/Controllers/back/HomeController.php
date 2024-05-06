<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{   


  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    public function dashboard(){

      return view('back.pages.dashboard');
    }
}
