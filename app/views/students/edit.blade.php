@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Edit Student', 'crumbs' => ['Students' => route('students.index')] ] )

<div class="panel">
   <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
   <hr>

   @include( 'students._submenu', ['active' => 'profile'])

   {{ Form::model($student, ['route' => ['students.update', $student->id], 'method' => 'put']) }}
   @include("students/_profile_form")
   {{ Form::close() }}
</div>
@stop
