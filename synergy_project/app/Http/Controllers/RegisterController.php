<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function registration(Request $request){

        if(Auth::check()){
            return redirect(route('client.home'));
        }

        $validateFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'docs' => ['required', 'size:10', 'unique:users'],
        ]);

        $client = User::create($validateFields);
        if($client){
            Auth::login($client);
            return redirect(route('client.home'));
        }
        else{
            return redirect(route('client.register'))->withErrors([
                'formError' => 'Ошибка регистрации',
            ]);
        }
    }
}
