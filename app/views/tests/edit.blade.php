@extends('layout')

@section('content')
<div class="panel">
   @include('partials.crumbs', ['current' => 'Edit Test', 'crumbs' => ['Tests' => route('tests.index')]])

   <h5><i class="fi-page-edit"></i> Edit Test</h5>
   <hr>
   {{ Form::model($test, ['route' => ['tests.update', $test->id], 'method' => 'put']) }}
   @include("tests/_form")
   {{ Form::close() }}
</div>
@stop
