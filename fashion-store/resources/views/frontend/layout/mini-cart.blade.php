@php
    $cartItems = \App\Models\Cart::where('user_id', auth()->user()->id ?? '')->get();
    $subtotal = $cartItems->reduce(function ($carry, $item) {

            return $carry + ($item->product->price * $item->qty);
            
        }, 0)
@endphp
<div class="mini_cart">
    <div class="cart_gallery">
        <div class="cart_close">
            <div class="cart_text">
                <h3>cart</h3>
            </div>
            <div class="mini_cart_close">
                <a href="javascript:void(0)"><i class="icon-close icons"></i></a>
            </div>
        </div>
       
        @foreach ($cartItems as $cartItem)
        <div class="cart_item">
            <div class="cart_img">
                <a href="{{ route('cart-page', $cartItem->product->id) }}">
                    <img src="{{ asset($cartItem->Product->thumb_image) }}" alt="{{ $cartItem->product->name }}">
                </a>
            </div>
            <div class="cart_info">
                <a href="{{ route('cart-page', $cartItem->product->id) }}">{{ $cartItem->product->name }}</a>
                <p>{{ $cartItem->qty}} x <span>{{ $settings->currency_icon }}{{ $cartItem->product->price }}</span></p>
            </div>

            <form
            action="{{ route('cart.remove', $cartItem->id) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn"><i
                    class="ion-android-close"></i></button>
        </form>
    
        </div>
          @endforeach
              @if ($cartItems->count() === 0)
            <li class="text-center">Cart Is Empty!</li>
         @endif
    
       
            </div>
            <div class="mini_cart_table">
    <div class="cart_table_border">
        <div class="cart_total">
            <span>Sub total:</span>
            <span class="price">{{ number_format($subtotal, 2) }}
            </span>
        </div>
    </div>
</div>

    <div class="mini_cart_footer">
        <div class="cart_button">
            <a href="{{route('frontend.pages.cart-page')}}"><i class="fa fa-shopping-cart"></i> View cart</a>
        </div>
        <div class="cart_button">
            <a href="{{route('frontend.pages.checkout-pages')}}"><i class="fa fa-sign-in"></i> Checkout</a>
        </div>
    </div>
</div>

