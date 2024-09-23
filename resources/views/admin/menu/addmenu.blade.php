@extends('admin.main')
@section('content')

<form action="/admin/menu/addmenu" enctype="multipart/form-data" method="post">
    <div class="admin-content-main-content-product-add">
        <div class="admin-content-main-content-left">
            <div class="admin-content-main-content-two-input">
                <input type="text" value="{{old('name')}}" name="name" placeholder="Tên menu" id="">
            </div>
            <button type="submit" class="main-btn">Add Menu</button> <!-- Add a button to submit the form -->
        </div>        
    </div>
    @csrf
</form>

@endsection 
@section('footer')
    <script src="{{asset('backend/assets/js/product_ajax.js')}}"></script>
@endsection
