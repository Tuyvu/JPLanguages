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
                        <a href="{{route('courses.index')}}" class="btn btn-success">back</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
            
                            <th>#</th>
                            <th>tên</th>
                            <th>level</th>
                            <th>Ngày tạo</th>
                            <th>Ảnh</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($courses as $index =>$item)
                        <tr>
                            <td>{{ $courses->firstItem() + $index }}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->level}}</td>
                            <td>{{$item->created_at}}</td>
                            {{-- <td>{{$item->image}}</td> --}}
                            <td><img src="{{asset('storage/images')}}/{{$item->image}}" alt="" width="150px"></td>
                            
                            <td><a href="{{Route('courses.restore_id',$item->id)}}" class="btn btn-success">khôi phục</a></td>
                            <td><a href="{{Route('courses.foredelete',$item->id)}}" onclick="return confirmDelete();" class="btn btn-danger">xóa</a></td>
                        </tr>
                        @empty
                        <tr>
                            <span>chưa có dữ liệu</span>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {!! $courses->links('pagination::bootstrap-5') !!}
            </div>
        </div><!-- container -->

        <!--Start Rightbar-->
        <!--Start Rightbar/offcanvas-->

        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
@endsection
