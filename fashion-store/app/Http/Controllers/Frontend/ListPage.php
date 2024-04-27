<?php

namespace App\Http\Controllers\frontend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Adverisement;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use App\Models\Category; // Add this line

class Listpage extends Controller
{
    public function listpage(Request $request, $subcategorySlug = null)
    {
        $brands = Brand::all();
        $categories = Category::all(); // Fetch all categories from the database

        $products = Product::with('subCategory')->get(); // Fetch all products from the database

        return view('frontend.pages.product-list', ['categories' => $categories, 'products' => $products, 'brands' => $brands]); // Pass both categories and products to the view
    }


    public function cartpage()
    {
        if (!auth()->check()) { // Custom condition
            return redirect('/login');
        }
        return view('frontend.pages.cart-page');
    }
}
