@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-page-add"></i> Create Academic Session</h5>
      <hr>
      {{ Form::open(['route' => 'academicsessions.store', 'method' => 'post']) }}
         @include("academicsessions/_form")
      {{ Form::close() }}
   </div>
@stop
