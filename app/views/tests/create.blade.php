@extends('layout')

@section('content')
@include('partials.crumbs', ['current' => 'Create Test', 'crumbs' => ['Tests' => route('tests.index')]])

<div class="panel">
   <h5><i class="fi-page-add"></i> Create Test</h5>
   <hr>
   {{ Form::open(['route' => 'tests.store', 'method' => 'post']) }}
   @include("tests/_form")
   {{ Form::close() }}
</div>
@stop
