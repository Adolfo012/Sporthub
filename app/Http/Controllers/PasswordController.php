<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function create(Request $request){  //Show reset-password view
       return view('Login.reset-password',['request'=>$request]); //Returns the view with the request
    }

    public function store(Request $request){    //Restore-Password function
      $request->validate([  //Request password validation 
        'token'=>'required',
        'email'=>'required|email',
        'password' => 'required|alpha_num|min:8',
        'confirmpassword' => 'required|alpha_num|same:password|',
      ]);  

        $status = Password::reset(     //Reset the password
        $request->only('email','password','token'),
        function ($user,$password) {
            $user->forceFill([    
               'password'=>Hash::make($password), //Password Encrypt
               'remember_token'=>Str::random(60), //New Token
            ])->save(); //Save the password
           event(new PasswordReset($user));    //Update the new password
        }
       );
       //Redirect to Login
       return $status == Password::PASSWORD_RESET       //Returns if the email could be sent or not
                  ? redirect()->route('login.index')->with('status',__($status))
                  : back()->withInput($request->only('email'))
                          ->withErrors(['email'=>__($status)]);

    }   
}
