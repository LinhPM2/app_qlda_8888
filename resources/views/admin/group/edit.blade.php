@extends('admin.main')
@section('content')
    <form action="/admin/group/edit/{{$group->id}}" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="dealerName">Tên nhóm</label>
                <input type="text" name="groupName" value="{{ $group->groupName }}" class="form-control" id="groupName" >
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection
