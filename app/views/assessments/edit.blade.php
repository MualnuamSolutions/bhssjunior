@extends('layout')

@section('content')
   @include('partials.crumbs', ['current' => 'Edit Assessment Scheme', 'crumbs' => ['Assessment Schemes' => route('assessments.index')]])

   <div class="panel">
      <h5><i class="fi-page-edit"></i> Edit Assessment Scheme</h5>
      <hr>
      {{ Form::model($assessment, ['route' => ['assessments.update', $assessment->id], 'method' => 'put']) }}
         @include("assessments/_form")
      {{ Form::close() }}
   </div>
@stop
