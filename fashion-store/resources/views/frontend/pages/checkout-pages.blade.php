<!doctype html>
<html class="no-js" lang="en">

<head>
    @section('title')
    {{$settings->site_name}} | Checkout Page
    @endsection
  @include('frontend.layout.css')
</head>

<body>

    <!--offcanvas menu area start-->
    <div class="body_overlay">

    </div>
   @include('frontend.layout.mobile-menu')
    <!--offcanvas menu area end-->
    <!--mini cart-->
    @include('frontend.layout.mini-cart')
    <!--mini cart end-->

    <!--header area start-->
    @include('frontend.layout.header')
    <!--header area end-->

	<div class="main-body">
      <!--breadcrumbs area start-->
    <div class="breadcrumbs_area breadcrumbs_other">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-left">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><a href="#">checkout</a></li>
                        </ul>
                        <h3>checkout</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--Checkout page section-->
    <div class="checkout_section" id="accordion">
       <div class="container">
            <div class="returning_coupon_area">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="user-actions">
                            <h3>
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                Returning customer?
                                <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>

                            </h3>
                             <div id="checkout_login" class="collapse" data-parent="#accordion">
                                <div class="checkout_info">
                                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
                                    <form action="#">
                                        <div class="form_group">
                                            <label>Username or email <span>*</span></label>
                                            <input type="text">
                                        </div>
                                        <div class="form_group">
                                            <label>Password  <span>*</span></label>
                                            <input type="text">
                                        </div>
                                        <div class="form_group group_3 ">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                            <label for="remember_box">
                                                <input id="remember_box" type="checkbox">
                                                <span> Remember me </span>
                                            </label>
                                        </div>
                                        <a href="#">Lost your password?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="user-actions">
                            <h3>
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                Have a Coupon ?
                                <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon2" aria-expanded="true">Click here to enter your code</a>

                            </h3>
                             <div id="checkout_coupon2" class="collapse" data-parent="#accordion">
                                <div class="checkout_info coupon_info">
                                    
                                        <input placeholder="Coupon code" type="text">
                                        <button class="btn btn-primary" type="submit">Apply coupon</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------>
           <div class="checkout_form"> 
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                 <div class="container">
                 <div class="row">
 


             <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12"> 
            <h3>Billing Details</h3>
             </div>
            <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end"> 
            <button type="button" class="btn btn-primary" id="pop-up" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Address</button>
           </div>
            </div>
           </div> 


        <!-------------------MODEL---------------------->
          <div
                   class="modal fade"
                   id="exampleModal"
                   tabindex="-1"
                   aria-labelledby="exampleModalLabel"
                   aria-hidden="true"
                         >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="icon-social-twitter icons"></i>
                </button>
                <div class="myform">
                <h2 class="text-center">Add New Address</h2>
              
    <form id="myForm">
         <div class="container">
            <div class="row">
            <div class="mb-3 mt-4">
                <input class="form-control form-control-lg" name="name" type="text" placeholder="Name*" aria-label=".form-control-lg example">
            </div>
            <div class="col-md-6">
            <div class="mb-3">
                    <input class="form-control form-control-lg" name="phone" type="number" placeholder="Phone*" aria-label=".form-control-lg example">
             </div>
             </div>
            <div class="col-md-6">
            <div class="mb-3">
                    <input class="form-control form-control-lg" name="email" type="email" placeholder="Email*" aria-label=".form-control-lg example">
            </div>
             </div>
                  <div class="col-md-6">
                   <div class="mb-3">
                    <input class="form-control form-control-lg" name="country" type="text" placeholder="Country / Region*" aria-label=".form-control-lg example">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="state" type="text" placeholder="State*" aria-label=".form-control-lg example">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="city" type="text" placeholder="Town / City*" aria-label=".form-control-lg example">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="zip" type="text" placeholder="Zip*" aria-label=".form-control-lg example">
                </div>
            </div>
          </div>
         <div class="mb-3">
            <input class="form-control form-control-lg" name="address" type="text" placeholder="Address*" aria-label=".form-control-lg example">
          </div>
           <button type="button"  class="btn btn-light mt-3 btn-responsive"  onsubmit="AddRow()">Save Changes</button>
       
                               </div>
                           </form>
                        </div>
                    </div>
                 </div>
             </div>
         </div>
    </div>
          </div>
          <div class="container">
            <div class="row">
            <div class="col-lg-6 col-md-12">
            <div class="p-1">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Select Address
                    </label>
                </div>
            <div class="table-responsive">
          <table class="table">
          <tbody>
         <tr>
        <th scope="row">Name</th>
        <td>Dhoni</td>
         </tr>
          <tr>
        <th scope="row">Phone</th>
        <td>John Doe</td>
      </tr>
      <tr>
        <th scope="row">Email</th>
        <td>jerin@gmail.com</td>
      </tr>
      <tr>
        <th scope="row">Country</th>
        <td>New York</td>
      </tr>
      <tr>
        <th scope="row">City</th>
        <td>Engineer</td>
      </tr>
      <tr>
        <th scope="row">Zip Code</th>
            <td>Engineer</td>
        </tr>
         <tr>
        <th scope="row">Address</th>
            <td>193,anthoniyar street/Krishnan kuppam</td>
         </tr>
            </tbody>
         </table>
        </div>
        </div>
    
        </div>

    </div>
</div>

 
     </div>
         <div class="col-lg-5 col-md-6">
            <div class="order_table_right">
                 <form method="POST" action="{{ route('frontend.pages.checkout-pages') }}">
                     <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                               <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                            @foreach ($cartItems as $item)
                                            <tr>
                                                <td> {{ $item->product->name}} </td>
                                                <td class="text-right"> {{ number_format($item->product->price * $item->qty) }} </td>
                                            </tr>
                                            @endforeach
                                            
                                         </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Cart Subtotal </td>
                                                <td class="text-right">{{ $cartTotal }}</td>
                                            </tr>
                                            <tr class="order_total">
                                                <th>Order Total</th>
                                                <td class="text-right">{{ $cartTotal }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="panel-default">
                                        <div class="panel_radio">
                                            <input id="payment1" name="check_method" type="radio" data-target="createp_account" />
                                            <span class="checkmark"></span>
                                        </div>

                                        <label for="payment1" data-toggle="collapse" data-target="#panel1" >direct bank transfer</label>
                                        <div id="panel1" class="collapse show one" data-parent="#accordion">
                                            <div class="card-body1">
                                               <p>Donec sed odio dui. Nulla vitae elit libero, a phara etra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-default">
                                        <div class="panel_radio">
                                            <input id="payment2" name="check_method" type="radio" data-target="createp_account" />
                                            <span class="checkmark"></span>
                                        </div>
                                        <label for="payment2" data-toggle="collapse" data-target="#method2" >cheque payment</label>
                                        <div id="method2" class="collapse two" data-parent="#accordion">
                                            <div class="card-body1">
                                               <p>Donec sed odio dui. Nulla vitae elit libero, a phara etra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-default">
                                        <div class="panel_radio">
                                            <input id="payment3" name="check_method" type="radio" data-target="createp_account" />
                                            <span class="checkmark"></span>
                                        </div>
                                        <label for="payment3" data-toggle="collapse" data-target="#method3" >cash on delivery</label>
                                        <div id="method3" class="collapse three" data-parent="#accordion">
                                            <div class="card-body1">
                                               <p>Donec sed odio dui. Nulla vitae elit libero, a phara etra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-default">
                                        <div class="panel_radio">
                                            <input id="payment4" name="check_method" type="radio" data-target="createp_account" />
                                            <span class="checkmark"></span>
                                        </div>
                                        <label for="payment4" data-toggle="collapse" data-target="#method4" >Paypal</label>
                                        <div id="method4" class="collapse four" data-parent="#accordion">
                                            <div class="card-body1">
                                               <p>Donec sed odio dui. Nulla vitae elit libero, a phara etra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="place_order_btn">
                                   <a class="btn btn-primary" href="#">place order</a>
                               </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------>
        </div>
    </div>
    <!--Checkout page section end-->
	</div>

     <!--newsletter section start-->
    <section class="newsletter_section">
        <div class="container">
            <div class="news">
                <center>
                    <h3><b>Subscribe To Our Newsletter</b></h3>
                    <p>Subscribe to our email and get updates right in your inbox</p>
                </center>
                <section class="home-newsletter">
                    <div class="container">
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="single">
                        <div class="input-group">
                             <input type="email" class="form-control" placeholder="Enter your email">
                             <span class="input-group-btn">
                             <button class="btn btn-theme"    type="submit"><i class='fa fa-send-o'></i>
                             </button>
                             <button class="btn btn-theme" style="color: #DA627D; background-color: #F3F3F3;" type="submit"><i class="fa fa-facebook" ></i></i></button>

                             <button class="btn btn-theme" style="color: #DA627D; background-color: #F3F3F3;" type="submit"><i class="fa fa-instagram" ></i>
</i></button>

                             <button class="btn btn-theme" style="color: #DA627D; background-color: #F3F3F3;" type="submit"><i class="fa fa-twitter" ></i>
</i></button>

                             </span>
                              </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </section>

            </div>
        </div>
    </section>
    <!--newsletter section end-->
</div>

    <section>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <ul>
                            <li><img src="assets/img/logo/shoppingbag-kXT.png" alt=""></li>
                            <li><a href="#">Complete your style with awesome clothes from us.</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#">© 2024 All rights reserved.
                            </a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>help</h4>
                        <ul>
                            <li><a href="/contactus">privacy policy</a></li>
                            <li><a href="/aboutus">Shipping & Delivery</a></li>
                            <li><a href="/returnpolicy">Refund policy</a></li>
                            <li><a href="/termsandconditions">Track Your Order</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>store</h4>
                        <ul>
                            <li><a href="#">Mens fashion</a></li>
                            <li><a href="#">womens Fashion</a></li>
                            <li><a href="#">kids Fashion</a></li>
                            <li><a href="#">others</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>support</h4>
                        <ul>
                            <li><a href="#">Feedback</a></li>
                            <li><a href="#"> Contact us</a></li>
                            <li><a href="#">Download app</a></li>
                            <li><a href="#">Terms & condition</a></li>
                        </ul>
                    </div>

                </div>
            </div>
       </footer>

    </section>




   
    <script src="{{ asset('frontend/uthr/assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/vendor/popper.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery.scrollup.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/images-loaded.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/tippy-bundle.umd.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery.instagramFeed.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/mailchimp-ajax.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend/uthr/assets/js/main.js') }}"></script>


</body>

</html>
