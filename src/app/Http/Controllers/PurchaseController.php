<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use Illuminate\Http\Request;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function create($item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        $shipping = session('shipping_address');
        $addressData = $shipping ?? [
            'post_code' => $user->post_code,
            'address' => $user->address,
            'building' => $user->building,
        ];
        return view('purchase/create', compact('item', 'user', 'addressData'));
    }

    public function editShippingAddress($item_id)
    {
        $user = auth()->user();
        return view('purchase/edit_address', compact('user'));
    }

    public function updateShippingAddress(EditProfileRequest $request, $item_id)
    {
        $item = Item::findOrFail($item_id);
        $validated = $request->validated();
        session(['shipping_address' => $validated]);
        return redirect()->route('purchase.create', $item->id);
    }

    public function store($item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        return redirect()->route('/');
    }
}
