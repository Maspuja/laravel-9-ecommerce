<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if($carts == null)
        {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id' => $user_id
        ]);

        foreach ($carts as $cart){

            $product = Product::find($cart->product_id);

            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);

            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);

            $cart->delete();
        }
        
        return Redirect::route('show_order', compact('order'));
    }

    public function index_order()
    {
        
        $user_id = Auth::id();
        $orders = Order::where('user_id', $user_id)->get();
        return view('index_order', compact('orders'));
    }

    public function show_order(order $order)
    {
        $user_id = Auth::id();
        $user_name = Auth::user();
        return view('show_order', compact('order'));
    }

    public function submit_payment_receipt(Order $order, Request $request)
    {

        $request->validate([
            'payment_receipt' => 'required'
        ]);

        $file = $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, \file_get_contents($file));

        $order->update([
            'payment_receipt' => $path
        ]);

        return Redirect::back();
    }

    public function confirm_payment(Order $order, Request $request)
    {
        $order->update([
            'is_paid' => True
        ]);

        return Redirect::back();
    }

}
