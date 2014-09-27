@extends('layout')

@section('content')

@include('partials.crumbs', ['current' => 'Settings'])

<div class="panel">
   <h5><i class="fi-wrench"></i> Settings</h5>
   <hr>
   {{ Form::model($settings, ['route' => 'settings.store', 'method' => 'post']) }}
   @include("settings/_form")
   {{ Form::close() }}
</div>
@stop
