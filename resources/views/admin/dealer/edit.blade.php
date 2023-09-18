@extends('admin.main')
@section('content')
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 14px;
        text-align: left;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        margin: auto;
        margin-bottom: 50px;
    }

    table th {
        background-color: #ff9800;
        color: #fff;
        font-weight: bold;
        padding: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-top: 1px solid #fff;
        border-bottom: 1px solid #ccc;
    }

    table tr:nth-child(even) td {
        background-color: #f2f2f2;
    }

    table tr:hover td {
        background-color: #ffedcc;
    }

    table td {
        background-color: #fff;
        padding: 10px;
        border-bottom: 1px solid #ccc;
        font-weight: bold;
    }
</style>


    <form action="/admin/dealer/edit/{{$dealer->id}}" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
        <div class="form-group">
                <label for="dealerName">Tên Đại lý:</label>
                <input type="text" name="dealerName" class="form-control" value="{{$dealer->dealerName}}" id="dealerName" placeholder="Nhập Tên Đại lý">
            </div>

            <div class="form-group">
                <label for="gender">Giới Tính:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="0" {{$dealer->gender == 0 ? 'selected' : ''}}>Nam</option>
                    <option value="1" {{$dealer->gender == 1 ? 'selected' : ''}}>Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Số Điện thoại:</label>
                <input type="text" name="phoneNumber" value="{{$dealer->phoneNumber}}" class="form-control" id="phoneNumber" placeholder="Nhập số điện thoại">
            </div>

            <div class="form-group">
                <label for="dateOfBirth">Ngày sinh</label>
                <input type="date" name="dateOfBirth" value="{{$dealer->dateOfBirth}}" class="form-control" id="dateOfBirth" placeholder="Nhập ngày sinh">
            </div>

            <div class="form-group">
                <label for="country">Quốc gia:</label>
                <input type="text" name="country" value="{{$dealer->country}}" class="form-control" id="country" placeholder="Nhập Quốc gia">
            </div>

            <div class="form-group">
                <label for="specificAddress">Địa chỉ:</label>
                <input type="text" name="specificAddress" value="{{$dealer->specificAddress}}" class="form-control" id="specificAddress" placeholder="Nhập Địa chỉ">
            </div>

            <div class="form-group">
                <label for="businessItem">Mặt hàng kinh doanh:</label>
                <input type="text" name="businessItem" value="{{$dealer->businessItem}}" class="form-control" id="bussinessItem" placeholder="Nhập Mặt hàng kinh doanh">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>

    <!-- cac lien he khac-->
    <div class="card card-primary mt-4">
        <div class="card-header ">
            <h3 class="card-title">Các liên hệ khác của {{$dealer->dealerName}}</h3>
        </div>
    </div>
    <div class="mb-2">
        <a href="/admin/otherContact/add/{{$dealer->id}}" class="btn btn-success"><i class="fas fa-plus mr-1"></i>Thêm liên hệ khác</a>
    </div>
    <table class="mb-5">
        <thead>
            <tr >
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < count($otherContacts); $i++)
            <tr>
                <td>{{$otherContacts[$i]->fullName}}</td>
                <td>{{$otherContacts[$i]->dateOfBirth}}</td>
                <td>{{$otherContacts[$i]->gender == 0 ? "Nam" : "Nữ"}}</td>
                <td>{{$otherContacts[$i]->phoneNumber}}</td>
                <td>
                    <a href="/admin/otherContact/edit/{{$otherContacts[$i]->id}}"class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                    <button onclick="DeleteOtherContact({{$otherContacts[$i]->id}},'/admin/otherContact/delete')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

    <!-- Cac ngay ky niem -->
    <div class="card card-primary mt-4">
        <div class="card-header ">
            <h3 class="card-title">Các ngày kỉ niệm của {{$dealer->dealerName}}</h3>
        </div>
    </div>
    <div class="mb-2">
        <a href="/admin/anniversary/add/{{$dealer->id}}" class="btn btn-success"><i class="fas fa-plus mr-1"></i>Thêm ngày kỉ niệm khác</a>
    </div>
    <table class="mb-5">
        <thead>
            <tr >
                <th>Tên ngày kỉ niệm</th>
                <th>Ngày kỉ niệm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < count($anniversaries); $i++)
            <tr>
                <td>{{$anniversaries[$i]->name}}</td>
                <td>{{$anniversaries[$i]->eventDate}}</td>
                <td>
                    <a href="/admin/anniversary/edit/{{$anniversaries[$i]->id}}"class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                    <button onclick="DeleteAnniversary({{$anniversaries[$i]->id}},'/admin/anniversary/delete')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

    

@endsection
