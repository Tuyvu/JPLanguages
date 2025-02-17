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
                        <h3 class="box-title">Thêm mới Mã giảm giá</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('apply.sostdiscount') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group @error('name') has-error @enderror">
                                    <div class="col-md-6">
                                        <label >code</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Mã code" value="{{ old('code') }}" required>
                                        @error('code')
                                            <span class="help-block" style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label >Số lượng</label>
                                        <input type="text" class="form-control" id="count" name="count" placeholder="Số lượng" value="{{ old('count') }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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
                                        <select id="discountType" class="form-control">
                                            <option value="">Chọn kiểu</option>
                                            <option value="percentage">Giảm theo phần trăm</option>
                                            <option value="amount">Giảm theo giá tiền</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="percentageInput" style="display:none;">
                                    <label for="discountPercentage">Nhập phần trăm</label>
                                    <input type="text" class="form-control" id="discountPercentage" name="discountPercentage" placeholder="Nhập phần trăm" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>
                                <div class="col-md-6" id="amountInput" style="display:none;">
                                    <label for="discountAmount">Nhập giá tiền</label>
                                    <input type="text" class="form-control" id="discountAmount" name="discountAmount" placeholder="Nhập giá tiền" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group @error('production_date') has-error @enderror">
                                    <label for="production_date">Ngày bắt đầu</label>
                                    <input type="text" class="form-control" id="production_date" required name="start_date" placeholder="Ngày bắt đầu (DD-MM-YYYY)" value="{{ old('production_date') }}">
                                    @error('start_date')
                                        <span class="help-block" style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group @error('expiration_date') has-error @enderror">
                                    <label for="expiration_date">Ngày hết hạn</label>
                                    <input type="text" class="form-control" id="expiration_date" required name="end_date" placeholder="ngày kết thúc (DD-MM-YYYY)" value="{{ old('expiration_date') }}">
                                    @error('end_date')
                                        <span class="help-block" style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary mt-2">Thêm mới</button>
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
            document.getElementById('discountPercentage').setAttribute('required', 'required');
            document.getElementById('discountAmount').removeAttribute('required');
        } else if (this.value === 'amount') {
            percentageInput.style.display = 'none';
            amountInput.style.display = 'block';
            idpercentageInput.value=null;
            document.getElementById('discountAmount').setAttribute('required', 'required');
            document.getElementById('discountPercentage').removeAttribute('required');
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

        // Function to check if a year is a leap year
        const isLeapYear = (year) => {
            return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
        };

        // Function to validate day based on month and year
        const isValidDate = (day, month, year) => {
            const daysInMonth = [31, isLeapYear(year) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            return day >= 1 && day <= daysInMonth[month - 1];
        };

        const formatDateInput = (event) => {
            const input = event.target.value;
            const key = event.key;

            if (key !== ' ' && key !== '-' && key !== '/') return;

            const parts = input.replace(/[^0-9]/g, '').split('');
            let day = '', month = '', year = '';

            if (parts.length >= 1) day = parts.slice(0, 2).join('');
            if (parts.length >= 3) month = parts.slice(2, 4).join('');
            if (parts.length >= 5) year = parts.slice(4, 8).join('');

            if (day) {
                if (day.length === 1) day = '0' + day;
                const dayNum = parseInt(day);
                if (dayNum < 1 || dayNum > 31) {
                    alert('Ngày phải từ 01 đến 31');
                    event.target.value = '';
                    return;
                }
                event.target.value = `${day}-`;
            }
            if (month) {
                if (month.length === 1) month = '0' + month;
                const monthNum = parseInt(month);
                if (monthNum < 1 || monthNum > 12) {
                    alert('Tháng phải từ 01 đến 12');
                    event.target.value = '';
                    return;
                }
                event.target.value = `${day}-${month}-`;
            }
            if (year && year.length === 4) {
                const yearNum = parseInt(year);
                if (yearNum < 1900 || yearNum > 2100) {
                    alert('Năm phải từ 1900 đến 2100');
                    event.target.value = '';
                    return;
                }
                if (!isValidDate(parseInt(day), parseInt(month), yearNum)) {
                    alert('Ngày không hợp lệ cho tháng và năm đã nhập.');
                    event.target.value = '';
                    return;
                }
                event.target.value = `${day}-${month}-${year}`;
            }
            event.preventDefault();
        };

        const clearInvalidInput = (event) => {
            const inputValue = event.target.value.replace(/[-/ ]/g, '');
            if (inputValue.length === 8 && /^[0-9]+$/.test(inputValue)) {
                const day = parseInt(inputValue.slice(0, 2));
                const month = parseInt(inputValue.slice(2, 4));
                const year = parseInt(inputValue.slice(4));

                if (isValidDate(day, month, year)) {
                    event.target.value = `${inputValue.slice(0, 2)}-${inputValue.slice(2, 4)}-${inputValue.slice(4)}`;
                } else {
                    alert('Ngày không hợp lệ');
                    event.target.value = '';
                }
            } else {
                event.target.value = '';
            }
        };

        const validateDates = () => {
            const productionDate = new Date(productionDateInput.value.split('-').reverse().join('-'));
            const expirationDate = new Date(expirationDateInput.value.split('-').reverse().join('-'));

            if (productionDate && expirationDate && productionDate > expirationDate) {
                alert('Ngày sản xuất phải trước ngày hết hạn.');
                expirationDateInput.value = '';
            }
        };

        productionDateInput.addEventListener("keydown", formatDateInput);
        expirationDateInput.addEventListener("keydown", formatDateInput);
        productionDateInput.addEventListener("blur", clearInvalidInput);
        expirationDateInput.addEventListener("blur", clearInvalidInput);
        productionDateInput.addEventListener("change", validateDates);
        expirationDateInput.addEventListener("change", validateDates);
    });
</script>

@endsection
