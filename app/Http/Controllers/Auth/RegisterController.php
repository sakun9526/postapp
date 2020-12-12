<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }
    public function index(){
        return view('auth.Register');
    }

    public function store(Request $request){
        //dd is referring to die dump and it kills the page and return what you put inside the brackets
        //it can be a variable or string 
        //dd('abc');

        //validation 
        // dd($request);
        $this->validate($request, [
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed'
        ]);

        //store the user in the database
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        //sign in the user
        auth()->attempt($request->only('email','password'));
        return redirect()->route('login'); //redirect helper we use to redirect to the page after sign in

    }
}


//Hash::make() is a helper (facade) that helps to encrypt the password