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
<script type="text/javascript" src="{{ asset('jquery/jQuery.ajaxQueue.min.js') }}"></script>
<script type="text/javascript">
function rank(rank)
{
    if(rank >= 4)
        return rank + "<sup>th</sup>";
    else if(rank == 3)
        return rank + "<sup>rd</sup>";
    else if(rank == 2)
        return rank + "<sup>nd</sup>";
    else if(rank == 1)
        return rank + "<sup>st</sup>";
}
</script>
@yield('scripts')
</body>
</html>
