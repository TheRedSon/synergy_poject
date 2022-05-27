<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::check()){
            return redirect(route('client.home'));
        }

        $formFields = $request->only(['email', 'password']);

        if(Auth::attempt($formFields)){
            return redirect(route('client.home'));
        }
        else{
            return redirect(route('client.login'))->withErrors([
                'email' => 'Не удалось войти',
            ]);
        }
    }
}
