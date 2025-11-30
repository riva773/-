<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAddressRequest;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

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

    public function updateShippingAddress(EditAddressRequest $request, $item_id)
    {
        $item = Item::findOrFail($item_id);
        //$request->validated();は、バリデーションでOKになった項目だけを配列で取り出すメソッド。今まではそのアクション内で値を使っていたから不要だったが、sessionとして別のアクションに渡すので、$validatedとして格納して渡すために使用している。
        $validated = $request->validated();
        session(['shipping_address' => $validated]);
        return redirect()->route('purchase.create', $item->id);
    }

    public function store(Request $request, $item_id)
    {
        dd($request);
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        Order::create([
            'user_id' => $user->id,
            'item_id' => $item_id,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building,
            'payment_method' => $request->payment_method,
        ]);
        $item->update([
            'status' => 'sold'
        ]);

        return redirect()->route('/');
    }
}
