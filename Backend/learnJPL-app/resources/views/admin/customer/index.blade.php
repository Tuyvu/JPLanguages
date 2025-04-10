@extends('admin.layouts.master')
@section('title','homeadmin')
@section('mainad-content')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-9 m-b-xs">
                        <h1 class="btn btn-success">Customer</h1>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
            
                            <th>#</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số khóa học đăng ký</th>
                            <th>Trung bình điểm</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($customer as $index => $item)
                            <tr>
                                <td>{{ $customer->firstItem() + $index }}</td>
                                <td>{{$item->firstname}} {{$item->lastname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->countCourses()}}</td>
                                <td>{{$item->averageScore()}}</td>
                                <td>
                                    {{-- <a href="{{ route('admin.customer.show', $item->id) }}" class="btn btn-primary">Xem</a> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <span>chưa có dữ liệu</span>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {!! $customer->links('pagination::bootstrap-5') !!}
            </div>
        </div><!-- container -->

        <!--Start Rightbar-->
        <!--Start Rightbar/offcanvas-->

        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
@endsection