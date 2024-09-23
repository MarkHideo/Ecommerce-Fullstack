@extends('admin.main')
@section('content')
<div class="admin-content-main-content-product-list">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên menu</th>
                <th>Ngày đăng</th>
                <th>Tùy chỉnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->created_at }}</td>
                <td>
                    <a href="/admin/menu/editmenu/{{$menu->id}}" class="edit-class">Sửa</a> 
                    | 
                    <a onclick="removeRow(menu_id={{$menu->id}},url='/admin/menu/delete')" class="delete-class" href="#">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('footer')
    <script>
        function removeRow(menu_id,url){
            if(confirm('Are You Sure')){
                console.log(menu_id,url)
                $.ajax({
                url: url,
                data: {menu_id},
                method: 'GET',
                dataType:'JSON',
                success: function (res){
                    if(res.success == true){
                        location.reload();
                    }
            }
        })
      }
    }
    </script>
@endsection
