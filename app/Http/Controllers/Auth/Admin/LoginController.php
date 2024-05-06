<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\ConfirmRegNotification;
use App\Models\Admin;
use Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   protected function guard(){


      return Auth::guard('admin');
   }
    
    public function showLoginForm(){
       if(Auth::guard('admin')->check()){
         return redirect()->route('admin.index');

       }
      
       return  view('auth.admin.login');
   
    }
    public function login(Request $request)
    {

   
        $this->validate( $request, [
           'email' =>'required|email',
          'password' =>'required|string'
        ]);

        
 
           
             if(Auth::guard('admin')->attempt(['email' => $request->email, 'password'=>$request->password],$request->remember)){
                session()->flash('success','Verification Successful');
              return redirect()->intended(route('admin.index'));
             }else{

                session()->flash('s_error','Invalid login');
                return redirect()->route('admin.login');
             }

 
        }


        public function logout(Request $request){

           $this->guard()->logout();
           $request->session()->invalidate();

           return redirect()->route('admin.login');

        }

    
}
