@extends('admin.main')
@section('content')
<div class="p-4">
    <form action="{{route('order.store')}}" method="POST">
        <input type="text" name="id" class="form-control" value="{{$id}}" hidden>
        <div class="form-row">
            <div class="form-group col-md">
              <label>Đơn vị</label>
              <input type="text" class="form-control" name="unit">
            </div>
            <div class="form-group col-md-6">
              <label>Số lượng</label>
              <input type="text" class="form-control" name="quantity">
            </div>
          </div>
        <div>
            <label>Ghi chú</label>
          <textarea class="form-control" name="notes" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @csrf
      </form>
</div>
@endsection
