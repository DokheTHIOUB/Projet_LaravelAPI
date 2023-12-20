<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',[
            'except'=>[
                'login',
                'register'
            ]
            ]);
    }

    public function register(Request $req){
  
        $req->validate([
            'name'=>'required|string|max:90',
            'email'=>'required|string|email|max:50',
            'password'=>'required|min:5',
        ]);

        $user=User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);
        
        $token = Auth::login($user);

        return response()->json([
            'status'=>'success',
            'message'=>'l"utilisateur a bien été enregistré',
            'user'=> $user,
            'token'=> $token
        ]);
    }

    public function login(Request $req)  {
        
        $req->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $req->only('email','password');
        $token = Auth::attempt($credentials);
        
        if (!$token){
            return response()->json([
                'status' => 'erreur',
                'message' => ' La connexion a échoué '
            ]);
        }

    $user=Auth::user();
    if($user->role==='admin'){

        return response()->json([
              'user'=>$user,
              'authorization'=>[
                'token'=> $token,
                'type'=> 'bearer'
              ]
        ]);
    }

    else{
        
        return response()->json([
            'user'=>$user,
            'authorization'=>[
              'token'=> $token,
              'type'=> 'bearer'
            ]
      ]);
    }
  
        return response()->json([
            'status' => 'success',
            'message' => 'connexion réussie',
            'token' => $token
        ]);

    }

    public function logout(){
        Auth::logout();
        return response()->json([
            'message' => 'Déconnexion réussie'
        ]);
    }
}
