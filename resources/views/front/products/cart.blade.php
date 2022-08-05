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

            .cart_delete .delete {
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
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="cupon_text d-flex align-items-center">
                                            <form id="cpnForm" action="{{ url('/cart/apply-coupon') }}" method="post">
                                                @csrf
                                                {{-- <button type="submit" title="Apply" class="btn"> --}}
                                                <input type="text" name="coupon_code" placeholder="Coupon Code">

                                            </form>
                                            <a
                                                class="primary-btn"onclick="document.getElementById('cpnForm').submit();">Apply</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>total price</h5>
                                    </td>
                                    <td>
                                        <h5>

                                            ${{ $cart->price * $cart->quantity }}

                                        </h5>
                                    </td>
                                    <td>
                                <?php $total_amount = $total_amount + $cart->price * $cart->quantity; ?>

                                        @if (!empty(Session::get('CouponAmount')))
                                            <li>Sub Total <span>$ <?php echo $total_amount; ?></span></li>
                                            <li>Coupon Discount <span>$ <?php echo Session::get('CouponAmount'); ?></span></li>
                                            <li>Grand Total <span>$ <?php echo $total_amount - Session::get('CouponAmount'); ?></span></li>
                                        @else
                                            <li>Grand Total <span>$ <?php echo $total_amount; ?></span></li>
                                        @endif
                                    </td>

                                </tr>

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
