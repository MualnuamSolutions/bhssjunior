@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-page-edit"></i> Edit Class Room</h5>
      <hr>
      {{ Form::model($classroom, ['route' => ['classrooms.update', $classroom->id], 'method' => 'put']) }}
         @include("classrooms/_form")
      {{ Form::close() }}
   </div>
@stop
