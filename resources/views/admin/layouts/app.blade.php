<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/layouts/head')
</head>
<body class="text-left">

@include('admin/layouts/nav')

@section('main-content')

@show

@include('admin/layouts/footer')

@include('admin/layouts/scripts')

<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>

@yield('scripts')

</body>
</html>