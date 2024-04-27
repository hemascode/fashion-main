<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailPage extends Controller
{
    public function detailpage()
    {
        return view('frontend.pages.product-detail');
    }
}
