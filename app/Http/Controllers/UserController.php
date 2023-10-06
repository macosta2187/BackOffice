<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\Autenticacion;
use App\Http\Middleware\AuthController;




class UserController extends Controller
{
      

    public function Registro(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

   

        //return redirect()->route('users.index');
    }


    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // La autenticación ha tenido éxito
            return redirect('/inicio');
        }
    
        // La autenticación ha fallado
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }



    
}




    
