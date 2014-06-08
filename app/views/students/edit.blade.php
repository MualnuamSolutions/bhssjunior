@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-page-edit"></i> Edit Student</h5>
      <hr>
      {{ Form::model($student, ['route' => ['students.update', $student->id], 'method' => 'put']) }}
         @include("students/_form")
      {{ Form::close() }}
   </div>
@stop
