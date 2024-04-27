<?php

namespace App\Http\Controllers\frontend;

use App\Models\SubCategory;
use App\Models\Adverisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KidsDashboardController extends Controller
{
    public function index()
    {
       $kidsSubCategories = SubCategory::whereHas('category', function($query) {
              $query->where('name', 'kids');
          })
          ->where('status', 1)
          ->limit(12) 
          ->get();
          $homepage_secion_banner_three = Adverisement::where('key', 'homepage_secion_banner_three')->first();
          $homepage_secion_banner_three = json_decode($homepage_secion_banner_three?->value);
           return view('frontend.pages.kids-dashboard',['kidsSubCategories'=>$kidsSubCategories,'homepage_secion_banner_three' =>  $homepage_secion_banner_three]);
    }
}
