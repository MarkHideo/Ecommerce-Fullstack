<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
</head>
<body>
<!--header-->
    @include('parts.header')
<!--slider-->
    <section id="slider">
        <div class="YML">
            <div class="text-YML">
            <h2></h2>
            </div>      

            <div class="aspect-ratio-169">
                <img src="{{asset('frontend/assets/images/ou.png')}}">
                <img src="{{asset('frontend/assets/images/ou.png')}}">
                <img src="{{asset('frontend/assets/images/ou.png')}}">
                <img src="{{asset('frontend/assets/images/ou.png')}}">
            </div>
            <div class="dot-container">
                <div class="dot active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
    </section>
<!--hot products-->
<section class="popular"> 
  <div class="container">
    <div class="row-grid">
      <p class="heading-text">All Products</p>
    </div>
    <div class="row-grid row-grid-popular">
    @foreach ($products as $product)
      <div class="popular-item">
        <a href="/product/{{$product -> id}}"><img src="{{asset($product -> image)}}" alt=""></a>
        <p><a href="/product/{{$product -> id}}">{{$product -> name}}</a></p>
        <span>{{$product -> material}}</span>
        <div class="product-item-price">
          <p>{{number_format($product -> price_sale)}} <sup>đ</sup> <span>{{number_format($product -> price_normal)}}<sup>đ</sup></span></p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

    <!--footer-->
    @include('parts.footer')
</body>
</html>