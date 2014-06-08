@extends('layout')

@section('content')
   <ul class="breadcrumbs">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('classrooms.index') }}">Class Rooms</a></li>
      <li class="current">{{ $classroom->name }}</li>
   </ul>

   <div class="panel">
      <h5><i class="fi-thumbnails"></i> {{ $classroom->name }}</h5>
      <hr>


   </div>
@stop
