@extends('admin.main')
@section('content')
    <form action="/admin/dealer/add/store" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="dealerName">Tên Đại lý:</label>
                <input type="text" name="dealerName" class="form-control" id="dealerName" placeholder="Nhập Tên Đại lý">
            </div>

            <div class="form-group">
                <label for="gender">Giới Tính:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Số Điện thoại:</label>
                <input type="number" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Nhập số điện thoại">
            </div>

            <div class="form-group">
                <label for="dateOfBirth">Ngày sinh</label>
                <input type="date" name="dateOfBirth" class="form-control" id="dateOfBirth" placeholder="Nhập ngày sinh">
            </div>

            <div class="form-group">
                <label for="country">Quốc gia:</label>
                <input type="text" name="country" class="form-control" id="country" placeholder="Nhập Quốc gia">
            </div>

            <div class="form-group">
                <label for="specificAddress">Địa chỉ:</label>
                <input type="text" name="specificAddress" class="form-control" id="specificAddress" placeholder="Nhập Địa chỉ">
            </div>

            <div class="form-group">
                <label for="businessItem">Mặt hàng kinh doanh:</label>
                <input type="text" name="businessItem" class="form-control" id="bussinessItem" placeholder="Nhập Mặt hàng kinh doanh">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection
