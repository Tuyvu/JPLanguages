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
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-9 m-b-xs">
                        <a href="{{route('tests.create')}}" class="btn btn-success">Thêm mới bài kiểm tra</a>
                        <a href="{{route('tests.restore')}}" class="btn btn-success"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bài kiểm tra</th>
                            <th>Khóa học</th>
                            <th>số câu</th>
                            <th>thời gian</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($tests as $index =>$item)
                        <tr>
                            <td>{{$tests->firstItem() + $index }}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->course->title}}</td>
                            <td>{{$item->total_questions}}</td>
                            <td>{{$item->time_limit}}</td>
                            
                            <td><a href="{{Route('tests.edit',$item)}}" class="btn btn-success">sửa</a></td>
                            <td>
                                <form action="{{Route('tests.destroy',$item)}}" method="POST" onsubmit="return confirmDelete();">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
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
                {!! $tests->links('pagination::bootstrap-5') !!}
            </div>
            <script>
                function confirmDelete() {
                    return confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?");
                }
            </script>
        </div><!-- container -->

        <!--Start Rightbar-->
        <!--Start Rightbar/offcanvas-->

        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
@endsection
