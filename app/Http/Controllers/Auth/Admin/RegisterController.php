<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ConfirmRegNotification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $redirectTo = RouteServiceProvider::HOME;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no' => ['required', 'max:255'],
            'street_address' => ['required', 'max:255'],
    
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $user = User::create([
            
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->first_name,
            'street_address' => $request->street_address,
            'division_id' => 1,
            'district_id' => 1,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'ip_address' => request()->ip(),
            'remember_token'=> Str::random(40),
            'status' =>0,
            'password' => Hash::make($request->password),
        ]);
        $user ->notify(new ConfirmRegNotification($user,$user->remember_token));
        session()->flash('success','A confirmation email has sent to you..Please check and verify');

        return redirect('/');
    }
}
