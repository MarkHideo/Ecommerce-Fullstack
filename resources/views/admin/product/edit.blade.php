@extends('admin.main')
@section('content')

<form action="" enctype="multipart/form-data" method="post">
<div class="admin-content-main-content-product-add">
    <div class="admin-content-main-content-left">
        <div class="admin-content-main-content-two-input">
            <input type="text" value="{{$product -> name}}" name="name" placeholder="Tên sản phẩm" id="">
            <input type="text" value="{{$product -> material}}" name="material" placeholder="Chất liệu" id="">
        </div>
        <div class="admin-content-main-content-two-input">
            <input type="text" value="{{$product -> price_normal}}" name="price_normal" placeholder="Giá bán" id="">
            <input type="text" value="{{$product -> price_sale}}" name="price_sale" placeholder="Giá giảm" id="">
        </div>
        
        <!-- New Category Dropdown -->
        <div class="admin-content-main-content-two-input">
            <select name="category_id" id="category_id">
                <option value="">Chọn danh mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <textarea value="" name="description" id="editor">{{$product -> description}}</textarea>
        <textarea value="" name="content" id="editor">{{$product -> content}}</textarea>
        <button type="submit" class="main-btn">Cập nhật sản phẩm</button>
    </div>
    <div class="admin-content-main-content-right">
        <div class="admin-content-main-content-right-img">
            <label for="file">Ảnh đại diện</label>
            <input id="file" type="file">
            <input type="hidden" name="image" value="{{$product -> image}}" id="input-file-img-hiden">
            <div class="image-show" id="input-file-img">
                <img src="{{asset($product -> image)}}" alt="">
            </div>
        </div>
        <div class="admin-content-main-content-right-imgs">
            <label for="files">Ảnh sản phẩm</label>
            <input id="files" type="file" multiple>
            <div class="images-show" id="input-file-imgs">
                @php
                    $product_images = explode("*", $product -> images);
                @endphp                     
                @foreach ($product_images as $product_image)
                    <img src="{{asset($product_image)}}" alt="">
                    <input type="hidden" name="images[]" value="{{$product_image}}" id="input-file-img-hiden">
                @endforeach
            </div>
        </div>
    </div>
</div>
@csrf
</form>

@endsection
@section('footer')
    <script src="{{asset('backend\assets\js\product_ajax.js')}}"></script>
@endsection
