<!DOCTYPE html>
<html>
<head>
    <title>Student Result Management</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/print.css') }}">
    <link rel="stylesheet" media="print" type="text/css" href="{{ asset('css/print-hide.css') }}">
    @yield('styles')
</head>
<body>
@yield('content')

<script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
<script>
$(function(){
    window.print();
    setTimeout("window.close()", 1);
});
</script>
@yield('scripts')
</body>
</html>
