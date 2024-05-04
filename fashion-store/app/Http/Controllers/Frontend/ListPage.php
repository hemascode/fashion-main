<?php

namespace App\Http\Controllers\frontend;

use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Adverisement;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use App\Models\Category; // Add this line
use Symfony\Component\HttpFoundation\Session\Session;

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
    public function applyCoupon(Request $request)
    {
        if ($request->coupon_code === null) {
            return response(['status' => 'error', 'message' => 'Coupon filed is required']);
        }

        $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();
        
        if ($coupon === null) {
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        } elseif ($coupon->start_date > date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        } elseif ($coupon->end_date < date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'Coupon is expired']);
        } elseif ($coupon->total_used >= $coupon->quantity) {
            return response(['status' => 'error', 'message' => 'you can not apply this coupon']);
        }

        if ($coupon->discount_type === 'amount') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount
            ]);
        } elseif ($coupon->discount_type === 'percent') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount
            ]);
        }

        return response(['status' => 'success', 'message' => 'Coupon applied successfully!']);

    }
}
