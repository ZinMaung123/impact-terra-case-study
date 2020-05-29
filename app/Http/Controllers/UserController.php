<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('admin.users.apiTokens.show', compact('user'));
    }

    public function generate()
    {
        
        $user = Auth::user();
        $user->api_token = Str::random(80);
        $user->save();

        return back()->withSuccess('API token is generated successfully!');
    }

    public function setting()
    {
        $user = auth()->user();
        return view('admin.users.apiTokens.show', compact('user'));
    }
}
