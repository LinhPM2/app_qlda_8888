@extends('admin.main')
@section('content')
<div class="p-4">
    <form action="{{ route('order.update') }}" method="POST">
        @method('patch')
        <input type="text" name="id" class="form-control" value="{{$order->id}}" hidden>
        <div class="form-row">
            <div class="form-group col-md">
              <label>Đơn vị</label>
              <input type="text" class="form-control" name="unit" value="{{$order->unit}}">
            </div>
            <div class="form-group col-md-6">
              <label>Số lượng</label>
              <input type="text" class="form-control" name="quantity" value="{{$order->quantity}}">
            </div>
          </div>
        <div>
            <label>Ghi chú</label>
          <textarea class="form-control" name="notes" rows="3">{{$order->notes}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @csrf
      </form>
</div>
@endsection
