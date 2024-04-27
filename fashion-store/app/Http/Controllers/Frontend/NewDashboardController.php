<?php

namespace App\Http\Controllers\frontend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewDashboardController extends Controller
{
    public function index()
    {
        $NewSubCategories = SubCategory::whereHas('category', function($query) {
            $query->where('name', 'New');
        })
        ->where('status', 1)
        ->limit(12) 
        ->get();
        return view('frontend.pages.New-dashboard',['NewSubCategories'=>$NewSubCategories]);
    }
}
