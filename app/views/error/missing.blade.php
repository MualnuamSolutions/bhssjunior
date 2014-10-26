@extends('layout')

@section('title')
<h4><i class="fi-magnifying-glass"></i> {{_('Page Not Found')}}</h4>
@stop

@section('content')
<div class="alert-box secondary">
   <p>{{_('The page you are trying to access was not found. Please contact administrator.')}}</p>
</div>
@stop
