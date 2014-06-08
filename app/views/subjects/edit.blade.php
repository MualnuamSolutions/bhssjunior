@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-page-edit"></i> Edit Subject</h5>
      <hr>
      {{ Form::model($subject, ['route' => ['subjects.update', $subject->id], 'method' => 'put']) }}
         @include("subjects/_form")
      {{ Form::close() }}
   </div>
@stop
