<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Adverisement;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{

    /** Show cart page  */
    public function cartDetails()
    {

        // $cartItems = Cart::content();
        $cartItems = Cart::all();




        if (count($cartItems) === 0) {
            Session::forget('coupon');
            toastr('Please add some products in your cart for view the cart page', 'warning', 'Cart is empty!');
            return redirect()->route('frontend.pages.product-list');
        }

        // $cartpage_banner_section = Adverisement::where('key', 'cartpage_banner_section')->first();
        // $cartpage_banner_section = json_decode($cartpage_banner_section->value);



        return view('frontend.pages.cart-page', compact('cartItems'));
    }


    /** Add item to cart */
    public function addToCart(Request $request)
    {
        // dd($request);
        $product = Product::findOrFail($request->product_id);

        // check product quantity
        if ($product->qty === 0) {
            return response(['status' => 'error', 'message' => 'Product stock out']);
        } elseif ($product->qty < $request->qty) {
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
        }

        // $variants = [];
        // $variantTotalAmount = 0;

        // if($request->has('variants_items')){
        //     foreach($request->variants_items as $item_id){
        //         $variantItem = ProductVariantItem::find($item_id);
        //         $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
        //         $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
        //         $variantTotalAmount += $variantItem->price;
        //     }
        // }


        // /** check discount */
        // $productPrice = 0;

        // if(checkDiscount($product)){
        //     $productPrice = $product->offer_price;
        // }else {
        //     $productPrice = $product->price;
        // }
        if (!auth()->check()) { // Custom condition
            return redirect('/login');
        }
        $userId = Auth::user()->id;

        $attributes = [
            'user_id' => $userId,
            'product_id' => $product->id,
        ];

        $cartItem = Cart::where($attributes)->first();

        if ($cartItem) {
            $cartItem->increment('qty'); // Assuming 'quantity' is the name of the column
            $cartItem->save();
        } else {
            $values = [
                'qty' => 1, // Set the default quantity for a new cart item
            ];

            $cartData = Cart::create(array_merge($attributes, $values));
        }
        return redirect()->route('cart-page')->with(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }

    /** Update product quantity */
    public function updateProductQty(Request $request)
    {
        // Validate the request
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Find the cart item for the authenticated user
        $cartItem = Cart::where('user_id', Auth::id())->first();

        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }

        // Update the quantity
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        // Return response
        return response()->json(['message' => 'Cart updated successfully']);
    }




    /** get product total */
    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;
        return $total;
    }

    /** get cart total amount */
    public function cartTotal()
    {
        $total = 0;
        foreach (Cart::content() as $product) {
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    /** clear all cart products */
    public function clearCart()
    {
        $cartItems = Cart::all(); // Fetch all items from the cart
        Cart::destroy($cartItems); // Clear the cart

        return redirect()->route('cart-page')->with(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }

    /** Remove product form cart */
    public function removeProduct()
    {
        $userId = Auth::user()->id;

        $attributes = [
            'user_id' => $userId,
        ];

        $cartItem = Cart::where($attributes)->first(); // Fetch all items from the cart

        Cart::remove($cartItem);
        toastr('Product removed successfully!', 'success', 'Success');
        return redirect()->back();
    }

    /** Get cart count */
    public function getCartCount()
    {
        return Cart::content()->count();
    }

    /** Get all cart products */
    public function getCartProducts()
    {
        return Cart::content();
    }

    /** Romve product form sidebar cart */
    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);

        return response(['status' => 'success', 'message' => 'Product removed successfully!']);
    }



    /** Apply coupon */
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

    /** Calculate coupon discount */
    public function couponCalculation()
    {
        if (auth()->check()) {
            $cartItems = \App\Models\Cart::where('user_id', auth()->user()->id)->get();
            $total = $cartItems->reduce(function ($carry, $item) {
                return $carry + $item->product->price * $item->qty;
            }, 0);
        
        }

        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            $subTotal = $total;
            if ($coupon['discount_type'] === 'amount') {
                $total = $subTotal - $coupon['discount'];
                
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            } elseif ($coupon['discount_type'] === 'percent') {
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = $subTotal - $discount;
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
            }
            
        } else {
            $total = $total;
            return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
        }
    }

    public function remove($cartItem)
    {
        $cartItem = Cart::where('id', $cartItem)
            ->where('user_id', Auth::user()->id)
            ->first();
        if ($cartItem) {
            $cartItem->delete();
            return back()->with('success', 'Item removed from cart.');
        }

        return back()->with('error', 'Item could not be found.');
    }

    public function update(Request $request, $cartItem)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1', // Example validation
        ]);
        $cartItem = Cart::findOrFail($cartItem);
        if ($cartItem) {
            $cartItem->qty = $validatedData['quantity'];

            // Save the changes
            $cartItem->save();

            return back()->with('success', 'Update Quantity in cart.');
        }

        return back()->with('error', 'Item could not be found.');
    }
}
