@extends('layout')

@section('content')
   @include('partials.crumbs', ['current' => 'Edit Class Room', 'crumbs' => ['Class Rooms' => route('classrooms.index')]])

   <div class="panel">
      <h5><i class="fi-page-edit"></i> Edit Class Room</h5>
      <hr>
      {{ Form::model($classroom, ['route' => ['classrooms.update', $classroom->id], 'method' => 'put']) }}
         @include("classrooms/_form")
      {{ Form::close() }}
   </div>
@stop
