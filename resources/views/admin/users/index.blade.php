@extends('admin.main')
@section('content')
    <div class="">
        <a type="button" class="btn btn-success text-white ml-3 mt-2" href="{{ route('users.create') }}">
            <i class="fa fa-plus pr-1"></i> Thêm người dùng
        </a>
    </div>
    <div id="table_wrapper" class="mx-3 my-3">
        <table id="users_table" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th tabindex="0" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending"
                        aria-sort="ascending">Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles }}</td>
                        <td>
                            <a href="{{ route('users.detail', ['id' => $user->id]) }}" @class(['btn btn-primary', 'd-none' => Auth::user()->id == $user->id])>Edit</a>
                            <button type="button" data-id="{{ $user->id }}"
                                data-url="{{ route('users.delete', ['id' => $user->id]) }}"
                                @class([
                                    'deleteBtn',
                                    'btn btn-danger',
                                    'd-none' => Auth::user()->id == $user->id,
                                ])>Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
@section('extra_lib')
    <script>
        $(document).ready(function() {
            $('.deleteBtn').click(function() {
                var id = $(this).data('id');
                var url = $(this).data('url');
                Swal.fire({
                            title: '{{__('usermng.confirm')}}',
                            text: '{{__('usermng.warning_no_revert')}}',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            showLoaderOnConfirm: true,
                            confirmButtonText: '{{__('usermng.confirm_text_argee')}}'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                sendAjax('DELETE', id, url, (res) => {
                                    $(this).closest('tr').remove();
                                    Swal.fire('Success', res.message, 'success')
                                }, (res) => Swal.fire('Error Deleting', res.error, 'error'), JSON);
                                }})
            });
        });
    </script>
@endsection
