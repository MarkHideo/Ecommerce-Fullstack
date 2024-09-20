@extends('main')
@section('content')
    <section class="product-detail p-to-top">
        <form action="/cart/add" method="post">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Products</p><i class="ri-arrow-right-line"></i><p>{{$product -> name}}</p>
            </div>
            <div class="row-grid">
                <div class="product-detail-left">
                    <img class="main-img" src="{{asset($product -> image)}}" alt="">
                    <div class="product-image-item">
                        @php
                        $product_images = explode('*',$product -> images);
                        @endphp
                        @foreach ($product_images as $product_image)
                        <img src="{{asset($product_image)}}" alt="">
                        @endforeach   
                    </div>
                </div>
                <div class="product-detail-right">
                    <div class="product-detail-right-info">
                        <h1>{{$product -> name}}</h1>
                        <span>{{$product -> material}}</span>
                        <div class="product-item-price">
                          <p>{{number_format($product -> price_sale)}}<sup>đ</sup> <span>{{number_format($product -> price_normal)}}<sup>đ</sup></span></p>
                        </div>
                    </div>
                    <div class="product-detail-right-des">
                    <h2>Description</h2>
                    {{$product -> description}}
                    </div>
                    <div class="product-detail-right-quantity">
                        <h2>Amount:</h2>
                        <div class="product-detail-right-quantity-input">
                            <i class="ri-subtract-line"></i>
                            <input onkeydown="return false" class="quantity-inp" name="product_qty" type="number" value="1">
                            <input type="hidden" name="product_id" value="{{$product -> id}}">
                            <i class="ri-add-line"></i>
                        </div>
                    </div>
                    <div class="product-detail-right-addcart">
                        <button type="submit" class="main-btn">Art to cart</button>
                    </div>                 
                </div>
            </div>
            <div class="row-flex">
              <div class="product-detail-content">
              <h2>Product's Detail</h2>
              {{$product -> content}}
                <img src="{{asset('frontend/assets/images/logo.png')}}" alt="">
              </div>
            </div>
        </div>
        @csrf
        </form>
    </section>
@endsection