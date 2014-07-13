@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Edit Student', 'crumbs' => ['Students' => route('students.index')] ] )

<div class="panel">
   <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
   <hr>
   <ul class="button-group">
      <li><a href="{{ route('students.edit', $student->id) }}" class="button">Profile</a></li>
      <li><a href="{{ route('students.edit', $student->id) }}" class="button secondary">Physical Measurement</a></li>
      <li><a href="{{ route('students.enrollments', $student->id) }}" class="button secondary">Enrollments</a></li>
      <li><a href="{{ route('students.photos', $student->id) }}" class="button secondary">Photos</a></li>
   </ul>

   {{ Form::model($student, ['route' => ['students.update', $student->id], 'method' => 'put']) }}
   @include("students/_profile_form")
   {{ Form::close() }}
</div>
@stop
