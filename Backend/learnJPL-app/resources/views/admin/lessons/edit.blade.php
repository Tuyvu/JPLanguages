@extends('admin.layouts.master')
@section('title','homeadmin')
@section('mainad-content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container-xxl">
            <!-- Page Content-->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-9 m-b-xs">
                        <a href="{{route('lessons.index')}}" class="btn btn-success">back</a>
                    </div>
                </div>
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="my-2 box-header with-border">
                        <h3 class="box-title">cập nhật sản phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('lessons.update', $lessons->id) }}" enctype="multipart/form-data">
                      @method('PUT')  
                      @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group @error('name') has-error @enderror">
                                    <div class="col-md-6">
                                        <label for="productname">Tên bài học</label>
                                        <input type="text" class="form-control" id="productname" name="name" placeholder="tên bài học" value="{{ old('title', $lessons->title) }}">
                                        @error('name')
                                            <span class="help-block" style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="course_id">Chọn khóa học</label>
                                <select name="course_id" id="course_id" class="form-control">
                                    @foreach ($courses as $item)
                                        <option value="{{ $item->id }}" {{ old('course_id', $lessons->course_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group @error('video_url') has-error @enderror">
                                <label for="video_url">video</label>
                                <input type="text" class="form-control" name="video_url" placeholder="video_URL" value="{{ old('title', $lessons->video_url) }}">
                                @error('video_url')
                                    <span class="help-block" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            
                            

                            <div class="form-group @error('content') has-error @enderror">
                                <label for="editor">nội dung</label>
                                <textarea class="form-control" name="content" id="editor">{{ old('content',$lessons->content) }}</textarea>
                                @error('content')
                                    <span class="help-block" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                        <!-- /.box-body -->

                        <div class="my-2 box-footer">
                            <button type="submit" class="btn btn-primary">cập nhật</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- end page content -->
        </div>
       
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                    .then( editor => {
                            console.log( editor );
                    } )
                    .catch( error => {
                            console.error( error );
                    } );
        </script>
            
    </div>
</div>
@endsection
