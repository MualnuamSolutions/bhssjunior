@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-page-add"></i> Create Class Room</h5>
      <hr>
      {{ Form::open(['route' => 'classrooms.store', 'method' => 'post']) }}
         @include("classrooms/_form")
      {{ Form::close() }}
   </div>
@stop
