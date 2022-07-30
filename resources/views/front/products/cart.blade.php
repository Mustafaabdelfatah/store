@extends('layouts.site')

@section('content')
    @push('css')
        <style>
            .cart_quantity_up,
            .cart_quantity_down {
                display: inline-block;
                background: #ff7a00;
                width: 35px;
                text-align: center;
                color: $f2f2f2;
                color: #f2f2f2 !important;
                padding: -7px;
                border-radius: 4px;
                height: 20px;
                margin: auto;

                padding: -9px;
                line-height: 20px;
            }
           .cart_delete .delete{
                    width: 25px;
                    height: 26px;
                    font-size: 10px;

                    line-height: 20px;
                    text-align: center;
            }

            .cart_quantity_input {
                text-align: center;
                width: 74px;
                border-radius: 5px;
            }
        </style>
    @endpush
    @php
    use App\Models\Product;
    @endphp
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <!--================Cart Area =================-->
    <section class="cart_area">
        @if (Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
        @if (Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_amount = 0; ?>
                            @foreach ($userCart as $cart)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img style="width:100px; height:100px;" src="{{ $cart->cover }}"
                                                    alt="">
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $cart->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart_price">
                                        <p>${{ $cart->price }}</p>
                                        <?php $product_price = Product::getProductPrice($cart->product_id, $cart->size); ?>
                                        {{-- <p>$ {{ $product_price }}</p> --}}
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <a class="cart_quantity_up"
                                                href="{{ url('/cart/update-quantity/' . $cart->id . '/1') }}"> +
                                            </a>
                                            <input class="cart_quantity_input" type="text" name="quantity"
                                                value="{{ $cart->quantity }}" autocomplete="off" size="2">
                                            @if ($cart->quantity > 1)
                                                <a class="cart_quantity_down"
                                                    href="{{ url('/cart/update-quantity/' . $cart->id . '/-1') }}"> - </a>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">

                                            ${{ $cart->price * $cart->quantity }}

                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <form action="{{ url('/cart/delete-product/' . $cart->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="delete"><i class="fa fa-times"></i></button>
                                        </form>

                                    </td>
                                </tr>

                                <tr class="bottom_button">
                                    <td>
                                        <a class="gray_btn" href="#">Update Cart</a>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="cupon_text d-flex align-items-center">
                                            <input type="text" placeholder="Coupon Code">
                                            <a class="primary-btn" href="#">Apply</a>
                                            <a class="gray_btn" href="#">Close Coupon</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>$2160.00</h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Shipping</h5>
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <ul class="list">
                                                <li><a href="#">Flat Rate: $5.00</a></li>
                                                <li><a href="#">Free Shipping</a></li>
                                                <li><a href="#">Flat Rate: $10.00</a></li>
                                                <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                            </ul>
                                            <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                            <select class="shipping_select">
                                                <option value="1">Bangladesh</option>
                                                <option value="2">India</option>
                                                <option value="4">Pakistan</option>
                                            </select>
                                            <select class="shipping_select">
                                                <option value="1">Select a State</option>
                                                <option value="2">Select a State</option>
                                                <option value="4">Select a State</option>
                                            </select>
                                            <input type="text" placeholder="Postcode/Zipcode">
                                            <a class="gray_btn" href="#">Update Details</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="#">Continue Shopping</a>
                                            <a class="primary-btn" href="#">Proceed to checkout</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $total_amount = $total_amount + $cart->price * $cart->quantity; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            //delete
            $('.delete').click(function(e) {


                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "Confirm deleting record",
                    type: "warning",
                    killer: true,
                    buttons: [
                        Noty.button("Yes", 'btn btn-success mr-2', function() {
                            that.closest('form').submit();
                        }),

                        Noty.button("No", 'btn btn-danger', function() {
                            n.close();
                        })
                    ]
                });

                n.show();

            }); //end of delete

        }); //end of document ready
    </script>
@endpush
