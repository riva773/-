<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class AuthItemsController extends Controller
{
    public function index()
    {
        $items = Item::with('user')->get();
        return view('auth/index', compact('items'));
    }
}
