@extends('admin.main')
@section('content')
    <form action="/admin/group/add/store" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="dealerName">Tên nhóm</label>
                <input type="text" name="groupName" class="form-control" id="groupName" placeholder="Tên nhóm">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection
