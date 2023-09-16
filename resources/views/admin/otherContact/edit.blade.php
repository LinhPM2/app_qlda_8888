@extends('admin.main')
@section('content')
    <form action="/admin/otherContact/edit/{{$otherContact->id}}" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="fullName">Họ tên:</label>
                <input type="text" name="fullName" class="form-control" value="{{$otherContact->fullName}}" id="fullName" placeholder="Nhập Họ tên">
            </div>

            <div class="form-group">
                <label for="dateOfBirth">Ngày sinh</label>
                <input type="date" name="dateOfBirth" class="form-control" value="{{$otherContact->dateOfBirth}}" id="dateOfBirth" placeholder="Nhập ngày sinh">
            </div>

            <div class="form-group">
                <label for="gender">Giới Tính:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="0" {{$otherContact->gender == 0 ? 'selected' : ''}}>Nam</option>
                    <option value="1" {{$otherContact->gender == 1 ? 'selected' : ''}}>Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Số Điện thoại:</label>
                <input type="tel" name="phoneNumber" class="form-control" value="{{$otherContact->phoneNumber}}" id="phoneNumber" placeholder="Nhập số điện thoại">
            </div>

            <div class="form-group">
                <label for="IDDealer">Đại lý:</label>
                <select name="IDDealer" id="IDDealer" class="form-control">
                    <option value="{{ $dealer->id }}">{{ $dealer->dealerName }}</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>

@endsection
