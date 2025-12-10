<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function store(Request $request)
    {
        $validatedInput = $request->validate([
            'name' => ['required', 'string']
        ]);

        User::create($validatedInput);
        
    }
}
