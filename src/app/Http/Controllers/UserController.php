<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;



class UserController extends Controller
{
    public function edit_profile()
    {
        $user = User::findOrFail(auth()->id());
        return view('auth/profile', compact('user'));
    }

    public function update_profile(EditProfileRequest $request)
    {
        $user = User::findOrFail(Auth::id());
        $items = Item::all();
        $user->update([
            'name' => $request->name,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building,
        ]);
        return view('index', compact('user', 'items'));
    }
}
