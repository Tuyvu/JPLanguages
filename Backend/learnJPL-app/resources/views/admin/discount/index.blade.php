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
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">	
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-9 m-b-xs">
                        <h1 class="">Giảm giá</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 d-flex flex-wrap gap-2">
                        <a href="{{route('apply.discount')}}" class="btn btn-success">Thêm giảm giá</a>
                        <a class="btn btn-success">Giảm giá chung</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
            
                            <th>#</th>
                            <th>tên mã</th>
                            <th>số lượng</th>
                            <th>Kiểu</th>
                            <th>giá trị</th>
                            <th>ngày bắt đầu</th>
                            <th>ngày bắt kết thúc</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($discount as $index =>$item)
                        <tr>
                            <td>{{$discount->firstItem() + $index}}</td>
                            <td>{{$item->code }}</td>
                            <td>{{$item->count}}</td>
                            <td>{{$item->discount_type}}</td>
                            @if ($item->discount_type==1)
                            <td>{{$item->discount_amount}}</td>           
                            @else
                            <td>{{$item->discount_percentage}}</td>
                            @endif
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td><a href="{{Route('editdiscount',$item)}}" class="btn btn-success">sửa</a></td>
                            <td>
                                <form action="{{Route('deletediscount',$item)}}" method="POST" onsubmit="return confirmDelete();">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td><span>chưa có dữ liệu</span></td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {!! $discount->links('pagination::bootstrap-5') !!}
            </div>
        </div><!-- container -->
        <script>
            function confirmDelete() {
                return confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?");
            }
        </script>
        <!--Start Rightbar-->
        <!--Start Rightbar/offcanvas-->

        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
@endsection
