<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartPage extends Controller
{
    public function cartpage()
    {
        return view('frontend.pages.cart-page');
    }
}
