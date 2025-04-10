@extends('admin.layouts.master')
@section('title','homeadmin')
@section('mainad-content')
<div class="page-wrapper">
  <div class="page-content">
    <div class="container-xxl">
<!-- Page Content-->
        <div class="ibox-content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
              <strong>{{ $message }}</strong>
      </div>
      @endif
      <div class="row">
          <div class="col-sm-9 m-b-xs">
              <a href="{{route('lessons.index')}}" class="btn btn-success">back</a>
          </div>
      </div>
      <div class="table-responsive">
          <table class="table table-striped">
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>tên bài học</th>
                    <th>Khóa học</th>
                    <th>nội dung</th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody>
                    @forelse ($lessons as $index =>$item)
                    <tr>
                        <td>{{$lessons->firstItem() + $index }}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->course->title}}</td>
                        <td>
                            <iframe width="150px" height="100px" src="{{$item->video_url}}" frameborder="0" allowfullscreen></iframe>
                        </td>
                        
                        <td><a href="{{Route('lessons.restore_id',$item->id)}}" class="btn btn-success">khôi phục</a></td>
                        <td><a href="{{Route('lessons.foredelete',$item->id)}}" onclick="return confirmDelete();" class="btn btn-danger">xóa</a></td>
                    </tr>
                    @empty
                    <tr>
                        <span>chưa có dữ liệu</span>
                    </tr>
                    @endforelse
                    </tbody>
            </table>
          </table>
      </div>
      <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?");
        }
    </script>
  </div> 
        <!-- end page content -->
    </div>
</div>
    <!-- Page Content-->
     <!-- end page content -->
</div>
@endsection
