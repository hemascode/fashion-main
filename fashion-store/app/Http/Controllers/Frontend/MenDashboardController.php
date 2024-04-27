<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Adverisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenDashboardController extends Controller
{
    public function index()
    {
       // Define the category names you want to include
       $includedCategories = ['new', 'men', 'women', 'season', 'kids'];
    
       // Fetch categories that are included in the $includedCategories array
       $categories = Category::whereIn('name', $includedCategories)->get();
       $otherCategories = Category::whereNotIn('name', $includedCategories)->get();
    
    
       return view('frontend.home', compact('categories','otherCategories'));
    }
        public function menindex()
        {
            $menSubCategories = SubCategory::whereHas('category', function($query) {
                  $query->where('name', 'men');
              })
              ->where('status', 1)
              ->limit(12) 
              ->get();
    
              $homepage_secion_banner_three = Adverisement::where('key', 'homepage_secion_banner_three')->first();
              $homepage_secion_banner_three = json_decode($homepage_secion_banner_three?->value);
    
               return view('frontend.pages.Men-dashboard',['menSubCategories' =>  $menSubCategories,
               'homepage_secion_banner_three' =>  $homepage_secion_banner_three]);
        }
        
}
