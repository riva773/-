<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

class OrdersController extends Controller
{
    public function store(OrderRequest $request, $item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        Order::create([
            'item_id' => $item_id,
            'user_id' => $user->id,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building,
            'payment_method' => $request->payment_method,
        ]);
        $item->update([
            'status' => 'sold',
        ]);
        return redirect()->route('/')->with('success', '商品を購入しました。');
    }
}
