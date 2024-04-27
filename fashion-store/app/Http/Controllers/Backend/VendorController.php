<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function dashboard()
    {
        $vendorId = Auth::user()->vendor->id ?? null;

        $todaysOrder = Order::whereDate('created_at', Carbon::today())->whereHas('orderProducts', function ($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })->count();
        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())
            ->where('order_status', 'pending')
            ->whereHas('orderProducts', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })->count();
        $totalOrder = Order::whereHas('orderProducts', function ($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })->count();
        $totalPendingOrder = Order::where('order_status', 'pending')
            ->whereHas('orderProducts', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })->count();
        $totalCompleteOrder = Order::where('order_status', 'delivered')
            ->whereHas('orderProducts', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })->count();
        $totalProducts = Product::where('vendor_id', $vendorId)->count();

        $todaysEarnings = Order::where('order_status', 'delivered')
            ->where('payment_status', 1)
            ->whereDate('created_at', Carbon::today())
            ->whereHas('orderProducts', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })->sum('sub_total');

        $monthEarnings = Order::where('order_status', 'delivered')
            ->where('payment_status', 1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereHas('orderProducts', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })->sum('sub_total');

        $yearEarnings = Order::where('order_status', 'delivered')
            ->where('payment_status', 1)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereHas('orderProducts', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })->sum('sub_total');


        $toalEarnings = Order::where('order_status', 'delivered')
            ->whereHas('orderProducts', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })->sum('sub_total');

        $totalReviews = ProductReview::whereHas('product', function ($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })->count();



        return view('vendor.dashboard.dashboard', compact(
            'todaysOrder',
            'todaysPendingOrder',
            'totalOrder',
            'totalPendingOrder',
            'totalCompleteOrder',
            'totalProducts',
            'todaysEarnings',
            'monthEarnings',
            'yearEarnings',
            'toalEarnings',
            'totalReviews'
        ));
    }

    public function login()
    {
        return view('admin.auth.vendor_login');
    }
}
