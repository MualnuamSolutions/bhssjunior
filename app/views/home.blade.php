@extends('layout')

@section('content')
<div class="panel">
   <p>Welcome, {{Sentry::getUser()->name}}</p>
</div>
@stop
