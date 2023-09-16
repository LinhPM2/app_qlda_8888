<!-- Bootstrap 4 -->
<script src="/theme/plugins/jquery/jquery.min.js"></script>
<script src="/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/theme/dist/js/adminlte.min.js"></script>
<script src="/theme/plugins/toastr/toastr.min.js"></script>
<script src="/theme/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="/theme/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/dealer.js"></script>
<script src="/js/otherContact.js"></script>
<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'ERROR!')
        @endforeach
    @endif
    @if (Session::has('error'))
        Swal.fire({
                    title: 'Error!',
                    text: '{{ Session::get('error') }}',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
    @endif
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}", 'success!')
        Swal.fire({
            icon: 'success',
            title: "{{ Session::get('success') }}",
            showConfirmButton: false,
            timer: 1500
        })
    @endif
</script>
