<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;



class UserController extends Controller
{
    public function edit_profile(Request $request)
    {
        $isFirst = $request->routeIs('profile_first');
        $user = User::findOrFail(auth()->id());
        return view('auth/profile', compact('user', 'isFirst'));
    }

    public function update_profile(EditProfileRequest $request)
    {
        $user = User::findOrFail(Auth::id());
        $isFirst = $request->isFirst;

        $data = [
            'name'      => $request->name,
            'post_code' => $request->post_code,
            'address'   => $request->address,
            'building'  => $request->building,
        ];

        if ($request->hasFile('image_url')) {
            $userImageName = $request->file('image_url')->getClientOriginalName();
            $userImage = $request->file('image_url')->storeAs('user_image', $userImageName, 'public');
            $data['image_url'] = $userImage;
        }
        $user->update($data);

        if ($isFirst === 'profile_first') {
            return redirect()->route('/');
        }

        return redirect()->route('profile');
    }

    public function profile(Request $request)
    {

        $query = Item::with('user');
        $user = auth()->user();
        if ($request->input('page') === 'purchased' && auth()->check()) {
            $query->whereHas('order', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        } else {
            $query->where('user_id', $user->id);
        }
        //$itemsは、クエリパラメータがpurchasedなら購入した商品のみ
        $items = $query->get();
        return view('auth/mypage', compact('user', 'items'));
    }
}
