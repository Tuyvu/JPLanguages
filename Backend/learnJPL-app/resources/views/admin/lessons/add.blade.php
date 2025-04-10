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
                        <a href="{{ route('lessons.index') }}" class="btn btn-success">back</a>
                    </div>
                </div>
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="my-2 box-title">Thêm mới bài học</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('lessons.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group @error('title') has-error @enderror">
                                    <div class="col-md-6">
                                        <label for="productname">Tên bài học</label>
                                        <input type="text" class="form-control" id="productname" name="title" placeholder="tên bài học" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="help-block" style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="course_id">Chọn khóa học</label>
                                <select name="course_id" id="course_id" class="form-control">
                                    @foreach ($courses as $item)
                                        <option value="{{ $item->id }}" {{ old('course_id') == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group @error('video_url') has-error @enderror">
                                <label for="video_url">video</label>
                                <input type="text" class="form-control" name="video_url" placeholder="video_URL">
                                @error('video_url')
                                    <span class="help-block" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group @error('content') has-error @enderror">
                                <label for="editor">Mô tả</label>
                                <textarea class="form-control" name="content" id="editor">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="help-block" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="my-2 box-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- end page content -->
        </div>
    </div>
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
        <script>
@endsection
