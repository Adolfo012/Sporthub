<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){ //View Login 
      $band = false;
      return view('Login.login',compact('band')); //Folder and file (Route)
    }

    public function recover_show(){ #Show the recover accont 
      return view('Login.forgot');
    }
    
    public function recover_accont(Request $request){ #Send the request in "recover accont"
      $request->validate([ //Validate the field
          'email'=>'required|email',
      ]);

      $status = Password::sendResetLink($request->only('email')); //Status Email
       
      return $status == Password::RESET_LINK_SENT       //Returns if the email could be sent or not
                 ? back()->with('status',__($status))
                 : back()->withInput($request->only('email'))
                         ->withErrors(['email'=>__($status)]);

    }
    public function user_login(LoginRequest $request){ //View Login 
      //$credentials = request()->only('email','password'); //Returns the inputs of the view login in "credentials"
      $remember = request()->filled('remember');    #Transform the checkbox into boolean = checkbox = "on" Then checkbox = "true" 
      
      if (Auth::attempt($request->only('email','password'),$remember)){  //Validates if the user is registered and creates an encrypted cookie for "remember"
        //Valid credentials
        request()->session()->regenerate(); //Regenerate Session ID
        return redirect()->intended('dashboard'); //Redirect to dashboard and protect views
    }
    //Invalid credentials

    $band = true;
    return view('Login.login',compact('band'));
    

  }
}
