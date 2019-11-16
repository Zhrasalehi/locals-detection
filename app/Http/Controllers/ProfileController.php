<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        return response()->json(['status' => 'OK']);
    }
}
