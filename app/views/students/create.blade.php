@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-page-add"></i> Create Student</h5>
      <hr>
      {{ Form::open(['route' => 'students.store', 'method' => 'post']) }}
         @include("students/_form")
      {{ Form::close() }}
   </div>
@stop
