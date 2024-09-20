@extends('admin.main')
@section('content')
<form action="/admin/product/add" enctype="multipart/form-data" method="post">
<div class="admin-content-main-content-product-add">
    <div class="admin-content-main-content-left">
        <div class="admin-content-main-content-two-input">
            <input type="text" value="{{old('name')}}" name="name" placeholder="Tên sản phẩm" id="">
            <input type="text" value="{{old('material')}}" name="material" placeholder="Chất liệu" id="">
        </div>
        <div class="admin-content-main-content-two-input">
            <input type="text" value="{{old('price_normal')}}" name="price_normal" placeholder="Giá bán" id="">
            <input type="text" value="{{old('price_sale')}}" name="price_sale" placeholder="Giá giảm" id="">
        </div>
        <textarea value="{{old('description')}}" name="description" id="editor">Đặc điểm nổi bật</textarea>
        <textarea value="{{old('content')}}" name="content" id="editor">Mô tả sản phẩm</textarea>
        <button type="submit" class="main-btn">Thêm sản phẩm</button>
    </div>
    <div class="admin-content-main-content-right">
        <div class="admin-content-main-content-right-img">
            <label for="file">Ảnh đại diện</label>
            <input id="file" type="file">
            <input type="hidden" name="image" id="input-file-img-hiden">
            <div class="image-show" id="input-file-img">

            </div>
        </div>
        <div class="admin-content-main-content-right-imgs">
            <label for="files">Ảnh sản phẩm</label>
            <input id="files" type="file" multiple>
            <div class="images-show" id="input-file-imgs">
                                        
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