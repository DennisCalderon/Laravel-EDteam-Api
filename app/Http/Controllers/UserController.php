<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; //agregando dependencia de la Clase: Auth
use Illuminate\Http\Response; //dependencia del método responce();

class UserController extends Controller
{
    public function login() {
        $data = [
            'email' => request('email'), // recibe el parámetro del Post
            'password' => request('password') // recibe el parámetro del Post
        ];
        if (Auth::attempt($data)){ // esto devuelve Tru o False
            $user = Auth::user(); // leemos el usuario que acaba de ser logeado
            $loginData['token'] = $user->createToken('EDtoken')->accessToken; // le devolvemos un token de acceso para que este usuario pueda ingresar siempre
            return response()->json([
                "data" => $loginData,
                "message" => "Bienvenido"
            ], 200);
        } else {
            return response()->json([
                "mensaje" => "Error en el login"
            ], 401);
        }
    }
}
