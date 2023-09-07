@extends('admin.main')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="pl-4">Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th class="w-50">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    {{-- <td>{{ $danhmuc->id }}</td> --}}
                    <td class="pl-4">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="w-50">{{ $user->roles }}</td>
                    <td><a class="btn btn-primary mr-3" href="/admin/users/edit/{{ $user->id }}">
                        <iclass="fa fa-edit "></i>
                        <span>View and Edit</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection

