<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OptionsController extends Controller
{
    public function index(){
        return view('options', ['data' => User::all()]);
    }

    public function update(Request $request, $id){
        $user = User::where('id', $id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->docs = $request->input('docs');

        $user->save();

        return redirect()->route('client.home')->with('success', 'Данные успешно изменены');
    }

    public function index_reset(){
        return view('reset', ['data' => User::all()]);
    }

    public function reset(Request $request, $id) {
        $user = User::where('id', $id)->first();

        $validateFields = $request->validate([
            'password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (password_verify($request->input('password'), $user->password)){
            $user->password = $request->input('new_password');
            $user->save();
            return redirect()->route('client.home')->with('success', 'Данные успешно изменены');
        }
        else{
            return redirect()->route('client.options-reset')->withErrors([
                'password' => 'Не верный пароль'
            ]);
        }}
}
