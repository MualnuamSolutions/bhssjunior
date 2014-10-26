@extends('layout')

@section('title')
<h4><i class="fi-lock"></i> {{_('Access Denied')}}</h4>
@stop

@section('content')
<div class="alert-box secondary">
   <p>{{_('You are not allowed to access this page. Please contact administrator.')}}</p>
</div>
@stop
