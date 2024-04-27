<?php

namespace App\Http\Controllers\frontend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonDashboardController extends Controller
{
    public function index()
    {
        $SeasonSubCategories = SubCategory::whereHas('category', function($query) {
            $query->where('name', 'Season');
        })
        ->where('status', 1)
        ->limit(12) 
        ->get();
        return view('frontend.pages.Season-dashboard',['SeasonSubCategories'=>  $SeasonSubCategories ]);
    }
}
