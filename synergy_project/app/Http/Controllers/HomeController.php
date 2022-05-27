<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function upload(Request $request, $id) {
        $img = $request->file('img');
        if($img) {
            $img = $img->store('uploads', 'public');
            $user = User::where('id', $id)->first();
            $user->image = $img;
            $user->save();
            return redirect(route('client.home'));
        }
        else{
            return redirect()->route('client.home')->withErrors([
                'img' => 'Ошибка!'
            ]);
        }
    }
}
