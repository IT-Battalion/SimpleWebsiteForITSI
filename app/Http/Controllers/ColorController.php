<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function setColor(Request $request) {
        $color = $request->validate([
            'color' => array(
                'string',
                'regex:/^#[a-zA-Z0-9]{6}$/',
                'required',
            )
        ])['color'];

        $user = Auth::user();
        $user->color = $color;
        $user->save();

        return redirect()->route('dashboard');
    }
}
