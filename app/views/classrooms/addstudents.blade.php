@extends('layout')

@section('content')

   @include('partials.crumbs', ['current' => 'Add Student', 'crumbs' => ['Class Rooms' => route('classrooms.index')]])

   <div class="panel">
      <h5><i class="fi-page-add"></i> Add Students</h5>
      <hr>
      {{ Form::open(['route' => 'classrooms.storestudents', 'method' => 'post']) }}
         @include("classrooms/_form_addstudent")
      {{ Form::close() }}
   </div>
@stop
