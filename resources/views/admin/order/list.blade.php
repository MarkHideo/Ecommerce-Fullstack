@extends('admin.main')
@section('content')
<div style="overflow:scroll; height:600px;" class="admin-content-main-content-order-list">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th>Chi tiết</th>
                <th>Ngày</th>
                <th>Trạng thái</th>
                <th>Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}},{{$order->ward}},{{$order->district}},{{$order->city}}</td>
                <td>{{$order->note}}</td>
                <td><a class="edit-class" href="/admin/order/detail/{{$order -> order_detail}}">Xem</a></td>
                <td>{{$order->created_at}}</td>
                <td>
                    @if($order->status == 0)
                        <a class="nonconfirm-order" href="">Chưa xác nhận</a>
                    @else
                        <a class="confirm-order" href="">Xác nhận</a>
                    @endif
                </td>
                <td><a onclick= "removeRow(order_id={{$order->id}},url='/admin/order/delete')" class="delete-class" href="">Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('footer')
    <script>
        function removeRow(order_id,url){
            if(confirm('Are You Sure')){
                console.log(order_id,url)
                $.ajax({
                url: url,
                data: {order_id},
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