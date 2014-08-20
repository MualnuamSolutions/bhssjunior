@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Create Result Configuration', 'crumbs' => ['Result Configurations' => route('result-configuration.index')] ] )

<div class="panel">

   <h5><i class="fi-page-add"></i> Create Configuration</h5>
   <hr>
   {{ Form::open(['route' => 'result-configuration.store', 'method' => 'post']) }}
   @include("result-configuration._form")
   {{ Form::close() }}
</div>
@stop
