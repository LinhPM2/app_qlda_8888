@extends('admin.main')
@section('content')
    <div id="table_wrapper">
        {{-- <table id="users_table" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1"
                        aria-label="Name: activate to sort column descending" aria-sort="ascending">Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th class="w-50">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="">{{ $user->roles }}</td>
                        <td><a class="btn btn-primary" href="/admin/users/edit/{{ $user->id }}">
                                <iclass="fa fa-edit "></i>
                                    <span>View and Edit</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }} --}}
    </div>
@endsection
@section('extra_lib')
    <script src="/theme/plugins/jquery/jquery.min.js"></script>
    <script src="/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/theme/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/theme/plugins/jszip/jszip.min.js"></script>
    <script src="/theme/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/theme/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#users_table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
            $('#users_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "data":{{}}
            });
        });
    </script>
@endsection
