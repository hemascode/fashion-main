<?php

namespace App\Http\Controllers\frontend;

use App\Models\SubCategory;
use App\Models\Adverisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WomenDashboardController extends Controller
{
    public function index()
    {
       $womenSubCategories = SubCategory::whereHas('category', function($query) {
              $query->where('name', 'women');
          })
          ->where('status', 1)
          ->limit(12) 
          ->get();
          $homepage_secion_banner_three = Adverisement::where('key', 'homepage_secion_banner_three')->first();
          $homepage_secion_banner_three = json_decode($homepage_secion_banner_three?->value);
           return view('frontend.pages.women-dashboard',['womenSubCategories' =>  $womenSubCategories,'homepage_secion_banner_three' =>  $homepage_secion_banner_three]);
    }
}
