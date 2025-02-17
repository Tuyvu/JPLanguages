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
                        <a href="{{route('discount')}}" class="btn btn-success">back</a>
                    </div>
                </div>
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cập nhật Mã giảm giá</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('updatediscount') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group @error('name') has-error @enderror">
                                    <input type="hidden" name="id" value="{{$discount->id}}">
                                    <div class="col-md-6">
                                        <label >code</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Mã code" value="{{ old('code',$discount->code) }}">
                                        @error('code')
                                            <span class="help-block" style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label >Số lượng</label>
                                        <input type="text" class="form-control" id="count" name="count" placeholder="Số lượng" value="{{ old('count',$discount->count) }}">
                                        @error('count')
                                            <span class="help-block" style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group @error('type') has-error @enderror">
                                    <div class="col-md-6">
                                        <label for="discountType">Kiểu giảm giá</label>
                                        <select id="discountType" class="form-control" name="discount_type" onchange="toggleDiscountInput()">
                                            <option value="">Chọn kiểu</option>
                                            <option value="percentage" {{ $discount->discount_type == 2 ? 'selected' : '' }}>Giảm theo phần trăm</option>
                                            <option value="amount" {{ $discount->discount_type == 1 ? 'selected' : '' }}>Giảm theo giá tiền</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="percentageInput" style="display: {{ $discount->discount_type == '2' ? 'block' : 'none' }};">
                                    <label for="discountPercentage">Nhập phần trăm</label>
                                    <input type="text" class="form-control" id="discountPercentage" name="discountPercentage" placeholder="Nhập phần trăm" value="{{ $discount->discount_percentage}}">
                                </div>
                                
                                <div class="col-md-6" id="amountInput" style="display: {{ $discount->discount_type == '1' ? 'block' : 'none' }};">
                                    <label for="discountAmount">Nhập giá tiền</label>
                                    <input type="text" class="form-control" id="discountAmount" name="discountAmount" placeholder="Nhập giá tiền" value="{{ $discount->discount_amount}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group @error('production_date') has-error @enderror">
                                    <label for="production_date">Ngày bắt đầu</label>
                                    <input type="text" class="form-control" id="production_date" name="start_date" placeholder="Ngày bắt đầu (DD-MM-YYYY)" value="{{ old('production_date',$discount->start_date) }}">
                                    @error('start_date')
                                        <span class="help-block" style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group @error('expiration_date') has-error @enderror">
                                    <label for="expiration_date">Ngày hết hạn</label>
                                    <input type="text" class="form-control" id="expiration_date" name="end_date" placeholder="ngày kết thúc (DD-MM-YYYY)" value="{{ old('expiration_date',$discount->end_date) }}">
                                    @error('end_date')
                                        <span class="help-block" style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
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
    document.getElementById('discountType').addEventListener('change', function() {
        const percentageInput = document.getElementById('percentageInput');
        const idpercentageInput = document.getElementById('discountPercentage');
        const amountInput = document.getElementById('amountInput');
        const idamountInput = document.getElementById('discountAmount');
        
        if (this.value === 'percentage') {
            percentageInput.style.display = 'block';
            amountInput.style.display = 'none';
            idamountInput.value=null;
        } else if (this.value === 'amount') {
            percentageInput.style.display = 'none';
            amountInput.style.display = 'block';
            idpercentageInput.value=null;
        } else {
            percentageInput.style.display = 'none';
            amountInput.style.display = 'none';
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
@endsection
