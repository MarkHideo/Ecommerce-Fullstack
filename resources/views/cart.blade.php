@extends('main')
@section('content')
    <section class="cart-section p-to-top">
        <form action="/cart/send" method="post">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Shopping Cart</p>
            </div>
            <div class="row-grid">
                <div class="cart-section-left">
                    <h2 class="main-h2">Order's detail</h2>
                    <div class="cart-section-left-detail">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Delete</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($products as $product)
                                @php
                                    $price = $product -> price_sale * Session::get('cart')[$product -> id];
                                    $total += $price
                                @endphp
                                <tr>
                                    <td><img style="width: 70px;" src="{{asset($product -> image)}}" alt=""></td>
                                    <td>
                                        <div class="product-detail-right-info">
                                            <h1>{{$product -> name}}</h1>
                                            <div class="product-item-price">
                                              <p>{{number_format($product -> price_sale)}} <sup>đ</sup> <span>{{number_format($product -> price_normal)}}<sup>đ</sup></span></p>
                                            </div>
                                        </div>
                                        <div class="product-detail-right-quantity-input">
                                            <i class="ri-subtract-line"></i>
                                            <input onkeydown="return false" class="quantity-inp" name="product_id[{{$product -> id}}]" type="number" value="{{Session::get('cart')[$product -> id]}}">
                                            <i class="ri-add-line"></i>
                                        </div>
                                        <td>
                                            <p>{{number_format($price)}}<sup>đ</sup></p>
                                        </td>
                                        <td><a href="/cart/delete/{{$product -> id}}"><i class="ri-close-fill"></i></a></td>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td style="font-weight: bold" colspan="2">Total Payment</td>
                                    <td style="font-weight: bold;text-align: center">{{number_format($total)}}<sup>đ</sup></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <button formaction="/cart/update" class="main-btn">Update Cart</button>
                        <a style="font-style: italic;" href="/"> >>Continue Shopping</a>
                    </div>
                </div>
                <div class="cart-section-right">
                    <h2 class="main-h2">Delivery Information</h2>
                    <div class="cart-section-right-input-name-phone">
                        <input type="text" placeholder="Name" name="name" id="">
                        <input type="text" placeholder="Phone No" name="phone" id="">
                    </div>
                    <div class="cart-section-right-input-email">
                        <input type="text" placeholder="Email" name="email" id="">
                    </div>
                    <div class="cart-section-right-select">
                        <select name="city" id="city">
                            <option value="">City</option>
                        </select>
                        <select name="district" id="district">
                            <option value="">District</option>
                        </select>
                        <select name="ward" id="ward">
                            <option value="">Ward</option>
                        </select>
                    </div>
                    <div class="cart-section-right-input-address">
                        <input type="text" placeholder="Address" name="address" id="">
                    </div>
                    <div class="cart-section-right-input-note">
                        <input type="text" placeholder="Note" name="note" id="">
                    </div>
                    <button class="main-btn">Send to Delivery</button>
                </div>
            </div>
        </div>
        @csrf
        </form>
    </section>
@endsection
@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="{{asset('frontend/assets/js/apiprovince.js')}}"></script>
@endsection 