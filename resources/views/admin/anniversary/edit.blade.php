@extends('admin.main')
@section('content')
    <form action="/admin/anniversary/edit/{{$anniversary->id}}" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên ngày kỉ niệm:</label>
                <input type="text" name="name" class="form-control" value="{{$anniversary->name}}" id="name" placeholder="Nhập Tên ngày kỉ niệm">
            </div>

            <div class="form-group">
                <label for="eventDate">Ngày kỉ niệm</label>
                <input type="date" name="eventDate" class="form-control" value="{{$anniversary->eventDate}}" id="eventDate" placeholder="Nhập ngày kỉ niệm">
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
