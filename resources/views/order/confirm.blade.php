@extends('main')
@section('content')
<section class="order-confirm p-to-top">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Confirm Order: <span style="font-weight: bold;">{{$order->name}} #{{$order->id}}</span></p>
            </div>
            <div class="row-flex">
                <div class="order-confirm-content">
                    <p>Your Order has been placed <span style="font-weight: bold;">Successfully</span>!<br>
                        <span style="font-size: small;">Please check your <span style="font-style: italic; font-weight: 600; font-size: large;">Email </span>to confirm your Order</span>
                    </p>
                    <br>
                    <button class="main-btn">Continue shopping</button>
                </div>
            </div>
        </div>
    </section>
@endsection