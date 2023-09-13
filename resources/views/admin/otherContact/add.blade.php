@extends('admin.main')
@section('content')
    <form action="/admin/otherContact/add/store" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="fullName">Họ tên:</label>
                <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Nhập Họ tên">
            </div>

            <div class="form-group">
                <label for="dateOfBirth">Ngày sinh</label>
                <input type="date" name="dateOfBirth" class="form-control" id="dateOfBirth" placeholder="Nhập ngày sinh">
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
                <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Nhập số điện thoại">
            </div>

            <div class="form-group">
                <label for="IDDealer">Đại lý:</label>
                <select name="IDDealer" id="IDDealer" class="form-control">
                    @for ($i = 0; $i < count($dealers); $i++)
                        <option value="{{ $dealers[$i]->id }}">{{ $dealers[$i]->dealerName }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection
