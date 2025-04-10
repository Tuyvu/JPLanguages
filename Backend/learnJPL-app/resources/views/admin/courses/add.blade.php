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
                        <a href="{{ route('courses.index') }}" class="btn btn-success">back</a>
                    </div>
                </div>
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="my-2 box-title">Thêm mới khóa học</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group @error('title') has-error @enderror">
                                    <div class="col-md-6">
                                        <label for="productname">Tên khóa</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="tên sản phẩm" onkeyup="ChangeToSlug()" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="help-block" style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="slug">Đường dẫn</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="đường dẫn" value="{{ old('slug') }}">
                                        @error('slug')
                                            <span class="help-block" style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group @error('level') has-error @enderror">
                                    <div class="col-md-6">
                                        <label for="price">Level</label>
                                        <input type="text" class="form-control" id="level" name="level" placeholder="level" value="{{ old('level') }}">
                                        @error('level')
                                            <span class="help-block" style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                   
                                </div>
                            </div>

                            <div class="form-group @error('photo') has-error @enderror">
                                <label for="image">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                                <img id="photo-preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;"/>
                                @error('photo')
                                    <span class="help-block" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group @error('description') has-error @enderror">
                                <label for="editor">Mô tả sản phẩm</label>
                                <textarea class="form-control" name="description" id="editor">{{ old('description') }}</textarea>
                                @error('description')
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

<script>
    

    function ChangeToSlug() {
        var name = document.getElementById("title").value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
        document.getElementById("slug").value = slug;
    }

    document.getElementById('photo').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('photo-preview').src = event.target.result;
                document.getElementById('photo-preview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

   
</script>

<script>
            document.addEventListener("DOMContentLoaded", function () {
            const productionDateInput = document.getElementById("production_date");
            const expirationDateInput = document.getElementById("expiration_date");

            const formatDateInput = (event) => {
                const input = event.target.value;
                const key = event.key;

                // Xử lý khi nhấn phím cách, -, hoặc /
                if (key !== ' ' && key !== '-' && key !== '/') return;

                // Tách các phần
                const parts = input.replace(/[^0-9]/g, '').split('');

                let day = '', month = '', year = '';
                
                // Lấy các phần tương ứng
                if (parts.length >= 1) {
                    day = parts.slice(0, 2).join(''); // Ngày
                }
                if (parts.length >= 3) {
                    month = parts.slice(2, 4).join(''); // Tháng
                }
                if (parts.length >= 5) {
                    year = parts.slice(4, 8).join(''); // Năm
                }

                // Kiểm tra hợp lệ cho ngày và tháng
                if (day) {
                    if (day.length === 1) {
                        day = '0' + day; // Thêm 0 vào đầu nếu ngày chỉ 1 chữ số
                    }
                    const dayNum = parseInt(day);
                    if (dayNum < 1 || dayNum > 31) {
                        alert('Ngày phải từ 01 đến 31');
                        event.target.value = ''; // Xóa giá trị nếu không hợp lệ
                        return;
                    }
                    event.target.value = `${day}-`; // Hoàn thành ngày
                }
                if (month) {
                    if (month.length === 1) {
                        month = '0' + month; // Thêm 0 vào đầu nếu tháng chỉ 1 chữ số
                    }
                    if (month.length === 2) {
                        const monthNum = parseInt(month);
                        if (monthNum < 1 || monthNum > 12) {
                            alert('Tháng phải từ 01 đến 12');
                            event.target.value = ''; // Xóa giá trị nếu không hợp lệ
                            return;
                        }
                        event.target.value = `${day}-${month}-`; // Hoàn thành tháng
                    }
                }
                if (year && year.length === 4) {
                    const yearNum = parseInt(year);
                    if (yearNum < 1900 || yearNum > 2100) {
                        alert('Năm phải từ 1900 đến 2100');
                        event.target.value = ''; // Xóa giá trị nếu không hợp lệ
                        return;
                    }
                    event.target.value = `${day}-${month}-${year}`; // Hoàn thành năm
                }

                // Ngăn chặn việc nhập thêm ký tự
                event.preventDefault();
            };

            const clearInvalidInput = (event) => {
                const inputValue = event.target.value.replace(/[-/ ]/g, ''); // Xóa dấu cách, gạch ngang và gạch chéo

                // Nếu đầu vào đủ 8 ký tự số
                if (inputValue.length === 8 && /^[0-9]+$/.test(inputValue)) {
                    const formattedDate = `${inputValue.slice(0, 2)}-${inputValue.slice(2, 4)}-${inputValue.slice(4)}`;
                    event.target.value = formattedDate; // Định dạng lại
                } else {
                    // Xóa giá trị nếu không đủ hoặc không hợp lệ
                    event.target.value = '';
                }
            };

            const validateDates = () => {
                const productionDate = new Date(productionDateInput.value.split('-').reverse().join('-'));
                const expirationDate = new Date(expirationDateInput.value.split('-').reverse().join('-'));

                if (productionDate && expirationDate && productionDate > expirationDate) {
                    alert('Ngày sản xuất phải trước ngày hết hạn.');
                    expirationDateInput.value = ''; // Xóa giá trị nếu không hợp lệ
                }
            };

            // Gán sự kiện cho các trường
            productionDateInput.addEventListener("keydown", formatDateInput);
            expirationDateInput.addEventListener("keydown", formatDateInput);

            // Thêm sự kiện blur để xử lý đầu vào
            productionDateInput.addEventListener("blur", clearInvalidInput);
            expirationDateInput.addEventListener("blur", clearInvalidInput);

            // Thêm sự kiện change để kiểm tra ngày
            productionDateInput.addEventListener("change", validateDates);
            expirationDateInput.addEventListener("change", validateDates);
            });
</script> 
        <script language="javascript">
          function ChangeToSlug()
          {
              var productname, slug;
        
              //Lấy text từ thẻ input title 
              productname = document.getElementById("title").value;
              // console.log(productname);
              //Đổi chữ hoa thành chữ thường
              slug = productname.toLowerCase();
        
              //Đổi ký tự có dấu thành không dấu
              slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
              slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
              slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
              slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
              slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
              slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
              slug = slug.replace(/đ/gi, 'd');
              //Xóa các ký tự đặt biệt
              slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
              //Đổi khoảng trắng thành ký tự gạch ngang
              slug = slug.replace(/ /gi, "-");
              //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
              //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
              slug = slug.replace(/\-\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-/gi, '-');
              slug = slug.replace(/\-\-/gi, '-');
              //Xóa các ký tự gạch ngang ở đầu và cuối
              slug = '@' + slug + '@';
              slug = slug.replace(/\@\-|\-\@|\@/gi, '');
              //In slug ra textbox có id “slug”
              document.getElementById('slug').value = slug;
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
