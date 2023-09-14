@extends('admin.main')
@section('content')
<br>
<div>
    <a href="/admin/group/add" class="btn btn-success">Thêm nhóm mới</a>
</div>
<br>
<div class="row">
    <div class="col-4">
        <form action="/admin/group/list" method="get">
            <div class="row">
                <div class="col-6">
                    <input class="d-flex form-control rounded" type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="Tìm theo tên">
                </div>
                <div class="col-6">
                    <button class="d-flex btn btn-primary" type="submit" class="btn btn-success">Tìm kiếm</i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<br>
<div class="row">
  @foreach ($group as $groups )
  <div class="col-sm-3 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <p class="card-text">{{ $groups->groupName }}</p>
        <a href="/admin/groupdetail/detail/{{$groups->id}}" class="btn btn-primary">Chi tiết</a>
        <a href="/admin/group/edit/{{$groups->id}}" class="btn btn-primary">Sửa</a>
        <button onclick="DeleteGroup({{$groups->id}},'/admin/group/delete')" class="btn btn-danger">Xoá</button>
      </div>
    </div>
  </div>
  @endforeach
  {{ $group->appends($_GET)->links() }}
</div>
@endsection
