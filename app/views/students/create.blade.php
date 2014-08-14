@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Create Student', 'crumbs' => ['Students' => route('students.index')] ] )

<div class="panel">

   <h5><i class="fi-page-add"></i> Create Student</h5>
   <hr>
   {{ Form::open(['route' => 'students.store', 'method' => 'post']) }}
   @include("students/_form")
   {{ Form::close() }}
</div>
@stop
