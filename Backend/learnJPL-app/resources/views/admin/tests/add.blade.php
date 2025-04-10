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
                        <a href="{{ route('tests.index') }}" class="btn btn-success">back</a>
                    </div>
                </div>
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="my-2 box-title">Thêm mới bài học</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('tests.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row"> 
                                <div class="form-group @error('title') has-error @enderror">
                                    <div class="col-md-6">
                                        <label for="productname">Tên bài học</label>
                                        <input type="text" class="form-control" id="productname" name="title" placeholder="tên bài kiểm tra" value="{{ old('title') }}">
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

                            <div class="form-group @error('total_questions') has-error @enderror">
                                <label for="video_url">total_questions</label>
                                <input type="text" class="form-control" name="total_questions" placeholder="total_questions">
                                @error('total_questions')
                                    <span class="help-block" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group @error('time_limit') has-error @enderror">
                                <label for="video_url">time_limit</label>
                                <input type="text" class="form-control" name="time_limit" placeholder="time_limit" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                @error('time_limit')
                                    <span class="help-block" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group @error('description') has-error @enderror">
                                <label for="editor">Mô tả</label>
                                <textarea class="form-control" name="description" id="editor">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="help-block" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div id="testcount-container">
                                <div class="test-group my-2">
                                    <h4>Bài kiểm tra</h4>
                                </div>
                            </div>
                            <div id="test-container">
                                <div class="test-group my-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-info" id="add-test">Thêm biến thể</button>
                                        </div>
                                    </div>
                                </div>
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
<script>
    document.getElementById('add-test').addEventListener('click', function() {
        var testContainer = document.getElementById('testcount-container');
        
        // Đếm số lượng câu hỏi hiện có
        var count = testContainer.querySelectorAll('.test-group').length;

        var newtestGroup = document.createElement('div');
        newtestGroup.className = 'test-group';
        newtestGroup.innerHTML = `
            <div class="row">
                <div>
                    <label for="test_name">Câu hỏi ${count}</label>
                    <input type="text" class="form-control" name="question[]" placeholder="Câu hỏi">
                </div>
            </div>
            <div class="mx-2 row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="test_stock">Đáp án A</label>
                            <input type="text" class="form-control mb-2" name="option_a[]" placeholder="Đáp án A">
                        </div>
                        <div class="col-md-6">
                            <label for="test_stock">Đáp án B</label>
                            <input type="text" class="form-control mb-2" name="option_b[]" placeholder="Đáp án B">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="test_stock">Đáp án C</label>
                            <input type="text" class="form-control mb-2" name="option_c[]" placeholder="Đáp án C">
                        </div>
                        <div class="col-md-6">
                            <label for="test_stock">Đáp án D</label>
                            <input type="text" class="form-control mb-2" name="option_d[]" placeholder="Đáp án D">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="test_stock">Đáp án đúng</label>
                            <input type="text" class="form-control mb-2" name="correct_answer[]" placeholder="Đáp án đúng">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger remove-test" style="margin-top: 21px;">Xóa biến thể</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        testContainer.appendChild(newtestGroup);

        // Sự kiện xóa câu hỏi
        newtestGroup.querySelector('.remove-test').addEventListener('click', function() {
            if (confirm('Bạn có chắc chắn muốn xóa câu hỏi này không?')) {
                testContainer.removeChild(newtestGroup);
                updateQuestionNumbers();
            }
        });
    });

    // Cập nhật lại số thứ tự câu hỏi sau khi xóa
    function updateQuestionNumbers() {
        var testGroups = document.querySelectorAll('#testcount-container .test-group');
        testGroups.forEach((group, index) => {
            var label = group.querySelector('label[for="test_name"]');
            if (label) {
                label.textContent = `Câu hỏi ${index}`;
            }
        });
    }
</script>

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
