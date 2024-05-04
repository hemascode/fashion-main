<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutPage extends Controller
{
  public function checkoutpage(Request $request)
  {
//     $userId = auth()->user()->id;
//     $cartTotal = $request->cartTotal;
//     $amt = $request->amt;
//     $curreny_name     // Assuming you have the logged-in user's ID
// = $request->curreny_name;
//     $curreny_icon = $request->curreny_icon;
//     $qty = $request->qty;
//     $pay_method = $request->pay_method;
//     $pay_status = $request->pay_status;
//     $add = $request->add;
//     $shipping_method = $request->shipping_method;
//     $coupon = $request->coupon;
//     $order = $request->order; 
       

    $setting = GeneralSetting::first();

    $userId = Auth::user()->id;

    if (auth()->check()) {
      $cartItems = \App\Models\Cart::where('user_id', auth()->user()->id)->get();
      $total = $cartItems->reduce(function ($carry, $item) {
          return $carry + $item->product->price * $item->qty;
      }, 0);
  }


    // Create a new order
    $order = new Order();

  

    $order->invocie_id = rand(1, 999999);
    $order->user_id = $userId;

    $order->sub_total = $total;
    $order->amount =$total;
    $order->currency_name =$setting->currency_name;
    $order->currency_icon =$setting->currency_icon;
    $order->product_qty = "8" ;
    $order->payment_method = "7";
    $order->payment_status = "8";
    $order->order_address =  "test";
    $order->shpping_method =  "8";
    $order->coupon =     "test";
    $order->order_status =  "test"; // Set the total amount for the order

    $order->save();

    // Redirect the user to the checkout page or any other page as needed
    return view('frontend.pages.order');
  }

  public function order()
  {
    return view('frontend.pages.order');
  }
}
