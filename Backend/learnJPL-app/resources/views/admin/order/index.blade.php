@extends('admin.layouts.master')
@section('title','homeadmin')
@section('mainad-content')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="ibox-content">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">	
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-9 m-b-xs">
                        <a href="{{route('admin.order')}}" class="btn btn-success">Danh sách đơn hàng</a>
                        <a href="{{route('admin.ordercomfirm')}}" class="btn btn-success">Danh sách đơn hàng đã xác nhận</i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
            
                            <th>#</th>
                            <th>mã đơn</th>
                            <th>tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th>tên</th>
                            <th>Địa chỉ</th>
                            <th>SDT</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($order as $index =>$item)
                        <tr>
                            <td>{{ $order->firstItem() + $index }}</td>
                            <td>{{$item->id}}</td>
                            <td>{{ number_format($item->total_money, 0, ',', '.') }} đ</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->fullname}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->phone}}</td>
                            <td><a href="{{Route('order.confirm',$item)}}" class="btn btn-success">xác nhận</a></td>
                        </tr>
                        @empty
                        <tr>
                            <span>chưa có dữ liệu</span>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {!! $order->links('pagination::bootstrap-5') !!}
            </div>
        </div><!-- container -->

        <!--Start Rightbar-->
        <!--Start Rightbar/offcanvas-->

        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
@endsection
