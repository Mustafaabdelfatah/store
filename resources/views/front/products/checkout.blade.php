@extends('layouts.site')

@section('content')

<section id="form" style="margin-top:20px;">
    <!--form-->
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check Out</li>
            </ol>
        </div>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
        @endif
        <form action="{{ url('/checkout') }}" method="post">{{ csrf_field() }}
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Bill To</h2>
                        <div class="form-group">
                            <input name="user_id" style="display: none;" id="billing_name" @if(!empty($userDetails->name))
                            value="{{ $userDetails->id }}" @endif type="text" placeholder="Billing Name"
                            class="form-control" />
                        </div>
                        <div class="form-group">
                            <input name="user_email" id="billing_address" @if(!empty($userDetails->email))
                            value="{{ $userDetails->email }}" @endif type="email" placeholder="Billing Address"
                            class="form-control" />
                        </div>
                        <div class="form-group">
                            <input name="billing_city" id="billing_city" @if(!empty($userDetails->city))
                            value="{{ $userDetails->city }}" @endif type="text" placeholder="Billing City"
                            class="form-control" />
                        </div>
                        <div class="form-group">
                            <select id="billing_country" name="country" class="form-control country">
                                @foreach ($countries as $country)
                                    <option value="{{$country->name}}">{{$country->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="billing_pincode" id="billing_pincode" @if(!empty($userDetails->name))
                            value="{{ $userDetails->pincode }}" @endif type="text" placeholder="Billing Pincode"
                            class="form-control" />
                        </div>
                        <div class="form-group">
                            <input name="billing_mobile" id="billing_mobile" @if(!empty($userDetails->mobile))
                            value="{{ $userDetails->mobile }}" @endif type="text" placeholder="Billing Mobile"
                            class="form-control" />
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="copyAddress">
                            <label class="form-check-label" for="copyAddress">Shipping Address same as Billing Address</label>
                        </div>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2></h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Ship To</h2>
                        <div class="form-group">
                            <input name="shipping_name" id="shipping_name" @if(!empty($shippingDetails->name))
                            value="{{ $shippingDetails->name }}" @endif type="text" placeholder="Shipping Name"
                            class="form-control" />
                        </div>
                        <div class="form-group">
                            <input name="shipping_address" id="shipping_address" @if(!empty($shippingDetails->address))
                            value="{{ $shippingDetails->address }}" @endif type="text" placeholder="Shipping Address"
                            class="form-control" />
                        </div>
                        <div class="form-group">
                            <input name="shipping_city" id="shipping_city" @if(!empty($shippingDetails->city))
                            value="{{ $shippingDetails->city }}" @endif type="text" placeholder="Shipping City"
                            class="form-control" />
                        </div>

                        <div class="form-group">
                            <select id="shipping_country" name="country" class="form-control country">
                                @foreach ($countries as $country)
                                    <option value="{{$country->name}}">{{$country->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="shipping_pincode" id="shipping_pincode" @if(!empty($shippingDetails->pincode))
                            value="{{ $shippingDetails->pincode }}" @endif type="text" placeholder="Shipping Pincode"
                            class="form-control" />
                        </div>
                        <div class="form-group">
                            <input name="shipping_mobile" id="shipping_mobile" @if(!empty($shippingDetails->mobile))
                            value="{{ $shippingDetails->mobile }}" @endif type="text" placeholder="Shipping Mobile"
                            class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-default">Check Out</button>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </form>
    </div>
</section>
<!--/form-->


@endsection

@push('js')
<script>
    $(function () {
        // Copy Billing Address to Shipping Address Script
        $("#copyAddress").click(function () {
            if (this.checked) {
                $("#shipping_name").val($("#billing_name").val());
                $("#shipping_address").val($("#billing_address").val());
                $("#shipping_city").val($("#billing_city").val());
                $("#shipping_state").val($("#billing_state").val());
                $("#shipping_pincode").val($("#billing_pincode").val());
                $("#shipping_mobile").val($("#billing_mobile").val());
                $("#shipping_country").val($("#billing_country").val());
            } else {
                $("#shipping_name").val('');
                $("#shipping_address").val('');
                $("#shipping_city").val('');
                $("#shipping_state").val('');
                $("#shipping_pincode").val('');
                $("#shipping_mobile").val('');
                $("#shipping_country").val('');
            }
        });
        //  $(document).ready(function() {
        //             $.ajax({
        //                 type: 'GET',
        //                 headers:{
        //                     'Accept': 'application/json',
        //                     'Content-Type': 'application/json',
        //                     'Access-Control-Allow-Origin': '*'
        //                 },
        //                 url: 'http://127.0.0.1:8080/activiti-rest/service/form/form-data?taskId=21159',
        //                 dataType: 'json',
        //                 success: function (data) {
        //                     alert(JSON.stringify(data));
        //                 }
        //             });
        //         })

        $.get("https://api.first.org/data/v1/countries" , function(data){
        data.forEach(function(element){
         $('.country').append('<option value="'+ element.name +'">'+ element.name +'</option>');});
        });

    });
</script>
@endpush
