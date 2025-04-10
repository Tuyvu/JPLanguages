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
                        <a href="{{route('lessons.create')}}" class="btn btn-success">Thêm mới danh mục</a>
                        <a href="{{route('lessons.restore')}}" class="btn btn-success"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>tên bài học</th>
                            <th>Khóa học</th>
                            <th>nội dung</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($lessons as $index =>$item)
                        <tr>
                            <td>{{$lessons->firstItem() + $index }}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->course->title}}</td>
                            <td>
                                <iframe width="150px" height="100px" src="{{$item->video_url}}" frameborder="0" allowfullscreen></iframe>
                            </td>
                            
                            <td><a href="{{Route('lessons.edit',$item)}}" class="btn btn-success">sửa</a></td>
                            <td>
                                <form action="{{Route('lessons.destroy',$item)}}" method="POST" onsubmit="return confirmDelete();">
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
                {!! $lessons->links('pagination::bootstrap-5') !!}
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
