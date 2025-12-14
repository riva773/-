<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

class OrdersController extends Controller
{
    //決済確定前の処理
    public function store(OrderRequest $request, $item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        $order = Order::create([
            'item_id' => $item_id,
            'user_id' => $user->id,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building,
            'payment_method' => $request->payment_method,
        ]);
        //stripeの設定
        $stripePriceId = 'price_1Se3PR3eNuzTP96TujdcQWHJ';
        $paymentMethodTypes = ['card'];
        if ($request->input('payment_method') === 'konbini') {
            $paymentMethodTypes = ['konbini'];
        }
        //stripeの画面に飛ばす
        return $request->user()->checkout($stripePriceId, [
            'payment_method_types' => $paymentMethodTypes,
            'success_url' => route('order.success', ['order_id' => $order->id]),
            'cancel_url' => route('order.cancel', ['order_id' => $order->id]),
        ]);
    }

    //決済確定後の処理
    public function success(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Order::findOrFail($orderId);
        $item = Item::findOrFail($order->item_id);
        $item->update([
            'status' => 'sold',
        ]);
        return redirect()->route('/')->with('success', '商品を購入しました。');
    }

    //失敗時の処理
    public function cancel(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Order::findOrFail($orderId);
        if ($order) {
            $order->delete();
        }
        return redirect()->route('/')->with('success', '購入をキャンセルしました');
    }
}
