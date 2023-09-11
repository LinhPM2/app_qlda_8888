<!-- Bootstrap 4 -->
<script src="/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/theme/dist/js/adminlte.min.js"></script>
<script src="/js/main.js"></script>
<script src="/theme/plugins/toastr/toastr.min.js"></script>
<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'ERROR!')
        @endforeach
    @endif
    @if (Session::has('error'))

        toastr.error('{{ Session::get('error') }}', 'ERROR!')
    @endif
    @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}', 'success!')
    @endif
</script>
