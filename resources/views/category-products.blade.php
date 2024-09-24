@extends('main')

@section('content')
<section class="search-results p-to-top">
    <div class="container">
        <div class="row-grid">
            <p class="heading-text">Products in Category: {{ $category->name }}</p>
        </div>
        <div class="row-grid row-grid-search">
            @forelse ($products as $product)
            <div class="popular-item">
                <div class="product-item-price">
                    <a href="/product/{{$product->id}}"><img src="{{asset($product->image)}}" alt=""></a>
                    <p><a href="/product/{{$product->id}}">{{$product->name}}</a></p>
                    <span>{{$product->material}}</span>
                    <div class="product-item-price">
                        <p>{{number_format($product->price_sale)}} <sup>đ</sup> <span>{{number_format($product->price_normal)}}<sup>đ</sup></span></p>
                    </div>
                </div>
            </div>
            @empty
            <p style="color: red">No products found in this category.</p> <br>
            @endforelse
        </div>
    </div>
</section>
@endsection
