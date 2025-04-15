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
                            <div class="form-group">
                                <label for="conversations">Hội thoại</label>
                                <div id="conversation-wrapper">
                                    <div class="conversation-item mb-2">
                                        <input type="text" name="conversations[0][speaker]" class="form-control mb-1" placeholder="Người nói (ví dụ: A)">
                                        <textarea name="conversations[0][content]" class="form-control" placeholder="Nội dung hội thoại"></textarea>
                                        <button type="button" class="btn btn-danger btn-sm remove-field mt-2">Xóa</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-secondary mt-1" onclick="addConversation()">+ Thêm câu</button>
                            </div>
                            <div class="form-group">
                                <label for="vocabularies">Từ vựng</label>
                                <div id="vocab-wrapper">
                                    <div class="vocab-item mb-2">
                                        <input type="text" name="vocabularies[0][word]" class="form-control mb-1" placeholder="Từ">
                                        <input type="text" name="vocabularies[0][meaning]" class="form-control mb-1" placeholder="Nghĩa">
                                        <input type="text" name="vocabularies[0][pronunciation]" class="form-control mb-1" placeholder="Cách đọc">
                                        <input type="text" name="vocabularies[0][example_sentence]" class="form-control" placeholder="Câu ví dụ">
                                        <button type="button" class="btn btn-danger btn-sm remove-field mt-2">Xóa</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-secondary mt-1" onclick="addVocab()">+ Thêm từ</button>
                            </div>
                            <div class="form-group">
                                <label for="patterns">Mẫu câu</label>
                                <div id="pattern-wrapper">
                                    <div class="pattern-item mb-2">
                                        <input type="text" name="patterns[0][pattern]" class="form-control mb-1" placeholder="Mẫu câu">
                                        <input type="text" name="patterns[0][usage]" class="form-control mb-1" placeholder="Cách dùng">
                                        <input type="text" name="patterns[0][example]" class="form-control" placeholder="Ví dụ">
                                        <button type="button" class="btn btn-danger btn-sm remove-field mt-2">Xóa</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-secondary mt-1" onclick="addPattern()">+ Thêm mẫu câu</button>
                            </div>
                            <div class="form-group">
                                <label for="kanjis">Chữ Hán</label>
                                <div id="kanji-wrapper">
                                    <div class="kanji-item mb-2">
                                        <input type="text" name="kanjis[0][character]" class="form-control mb-1" placeholder="Chữ Hán">
                                        <input type="text" name="kanjis[0][meaning]" class="form-control mb-1" placeholder="Ý nghĩa">
                                        <input type="text" name="kanjis[0][onyomi]" class="form-control mb-1" placeholder="Âm On">
                                        <input type="text" name="kanjis[0][kunyomi]" class="form-control mb-1" placeholder="Âm Kun">
                                        <input type="number" name="kanjis[0][strokes]" class="form-control mb-1" placeholder="Số nét">
                                        <input type="text" name="kanjis[0][example]" class="form-control" placeholder="Ví dụ">
                                        <button type="button" class="btn btn-danger btn-sm remove-field mt-2">Xóa</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-secondary mt-1" onclick="addKanji()">+ Thêm chữ</button>
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
{{-- hội thoại, từ vựng, Mẫu câu, chữ hán kết hợp api chuyển đổi sang hán tự --}}
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
            let conversationIndex = 1;
            let vocabIndex = 1;
            let patternIndex = 1;
            let kanjiIndex = 1;
        
            function addConversation() {
                const html = `
                    <div class="conversation-item mb-2">
                        <input type="text" name="conversations[${conversationIndex}][speaker]" class="form-control mb-1" placeholder="Người nói">
                        <textarea name="conversations[${conversationIndex}][content]" class="form-control" placeholder="Nội dung hội thoại"></textarea>
                        <button type="button" class="btn btn-danger btn-sm remove-field mt-2">Xóa</button>
                    </div>`;
                document.getElementById('conversation-wrapper').insertAdjacentHTML('beforeend', html);
                conversationIndex++;
            }
        
            function addVocab() {
                const html = `
                    <div class="vocab-item mb-2">
                        <input type="text" name="vocabularies[${vocabIndex}][word]" class="form-control mb-1" placeholder="Từ">
                        <input type="text" name="vocabularies[${vocabIndex}][meaning]" class="form-control mb-1" placeholder="Nghĩa">
                        <input type="text" name="vocabularies[${vocabIndex}][pronunciation]" class="form-control mb-1" placeholder="Cách đọc">
                        <input type="text" name="vocabularies[${vocabIndex}][example_sentence]" class="form-control" placeholder="Câu ví dụ">
                        <button type="button" class="btn btn-danger btn-sm remove-field mt-2">Xóa</button>

                    </div>`;
                document.getElementById('vocab-wrapper').insertAdjacentHTML('beforeend', html);
                vocabIndex++;
            }
        
            function addPattern() {
                const html = `
                    <div class="pattern-item mb-2">
                        <input type="text" name="patterns[${patternIndex}][pattern]" class="form-control mb-1" placeholder="Mẫu câu">
                        <input type="text" name="patterns[${patternIndex}][usage]" class="form-control mb-1" placeholder="Cách dùng">
                        <input type="text" name="patterns[${patternIndex}][example]" class="form-control" placeholder="Ví dụ">
                        <button type="button" class="btn btn-danger btn-sm remove-field mt-2">Xóa</button>

                    </div>`;
                document.getElementById('pattern-wrapper').insertAdjacentHTML('beforeend', html);
                patternIndex++;
            }
        
            function addKanji() {
                const html = `
                    <div class="kanji-item mb-2">
                        <input type="text" name="kanjis[${kanjiIndex}][character]" class="form-control mb-1" placeholder="Chữ Hán">
                        <input type="text" name="kanjis[${kanjiIndex}][meaning]" class="form-control mb-1" placeholder="Ý nghĩa">
                        <input type="text" name="kanjis[${kanjiIndex}][onyomi]" class="form-control mb-1" placeholder="Âm On">
                        <input type="text" name="kanjis[${kanjiIndex}][kunyomi]" class="form-control mb-1" placeholder="Âm Kun">
                        <input type="number" name="kanjis[${kanjiIndex}][strokes]" class="form-control mb-1" placeholder="Số nét">
                        <input type="text" name="kanjis[${kanjiIndex}][example]" class="form-control" placeholder="Ví dụ">
                        <button type="button" class="btn btn-danger btn-sm remove-field mt-2">Xóa</button>

                    </div>`;
                document.getElementById('kanji-wrapper').insertAdjacentHTML('beforeend', html);
                kanjiIndex++;
            }
            document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-field')) {
            e.target.parentElement.remove();
        }
    });
        </script>
        
@endsection
