@extends('layout')

@section('content')

@include( 'partials.crumbs', ['current' => 'Edit Subject', 'crumbs' => ['Subjects' => route('subjects.index')] ] )

<div class="panel">
   <h5><i class="fi-page-edit"></i> Edit Subject</h5>
   <hr>
   {{ Form::model($subject, ['route' => ['subjects.update', $subject->id], 'method' => 'put']) }}
   @include("subjects/_form")
   {{ Form::close() }}
</div>
@stop
