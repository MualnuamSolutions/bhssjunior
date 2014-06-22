@extends('layout')

@section('content')
   @include('partials.crumbs', ['current' => 'Create Scheme', 'crumbs' => ['Assessment Schemes' => route('assessments.index')]])

   <div class="panel">
      <h5><i class="fi-page-add"></i> Create Assessment Scheme</h5>
      <hr>
      {{ Form::open(['route' => 'assessments.store', 'method' => 'post']) }}
         @include("assessments/_form")
      {{ Form::close() }}
   </div>
@stop
