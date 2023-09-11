@extends('admin.main')
@section('content')
    <div class="">
        <a type="button" class="btn btn-success text-white ml-3 mt-2" href="{{route('users.create')}}">
            <i class="fa fa-plus pr-1"></i> Thêm người dùng
        </a>
    </div>
    <div id="table_wrapper" class="mx-3 my-3">
        <table id="users_table" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1"
                        aria-label="Name: activate to sort column descending" aria-sort="ascending">Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
@section('extra_lib')
    <script src="/theme/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/theme/plugins/jszip/jszip.min.js"></script>
    <script src="/theme/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/theme/plugins/pdfmake/vfs_fonts.js"></script>
    {{-- datatable config  --}}
    <script>
        $(function() {
            table = $('#users_table').DataTable({
                paging: true,
                lengthChange: true,
                lengthMenu: [10, 25, 50, 75, 100],
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                columns: [
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'roles' },
                    {
                        "className": 'options',
                        "data": "id",
                        "render": function(data, type, full, meta) {
                            return `<a class="btn btn-primary edit-btn" href="admin/user/${full.id}"><iclass="fa fa-edit "></i><span>View and Edit</span></a>
                                    <a class="btn btn-danger"><i class="fas fa-trash"></i></a>`

                        }
                    }
                ],
                ajax: {
                    url: "{{route('api.users.list')}}",
                    dataSrc: 'data',
                    dataFilter: function(data) {
                        var json = jQuery.parseJSON(data);
                        json.recordsTotal = json.total;
                        json.recordsFiltered = json.total;
                        json.data = json.data;
                        return JSON.stringify(json);
                    }
                },
                responsive: true,
                processing: true,
                searching: true,
                serverSide: true,
            });
        });
    </script>
@endsection
