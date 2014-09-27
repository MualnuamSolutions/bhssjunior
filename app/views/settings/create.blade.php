@extends('layout')

@section('content')
<div class="panel">
   <h5><i class="fi-page-add"></i> Create Subject</h5>
   <hr>
   {{ Form::open(['route' => 'subjects.store', 'method' => 'post']) }}
   @include("subjects/_form")
   {{ Form::close() }}
</div>
@stop
