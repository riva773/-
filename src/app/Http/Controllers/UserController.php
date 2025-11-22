<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;



class UserController extends Controller
{
    public function edit_profile()
    {
        $user = Auth::user();
        return view('auth/profile', compact('user'));
    }

    public function update_profile()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('index', compact('user', 'items'));
    }
}
