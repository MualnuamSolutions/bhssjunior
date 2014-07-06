@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Add Enrollment', 'crumbs' => ['Students' => route('students.index')] ] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>
    <ul class="button-group">
        <li><a href="{{ route('students.edit', $student->id) }}" class="button secondary">Profile</a></li>
        <li><a href="{{ route('students.enrollments', $student->id) }}" class="button">Enrollments</a></li>
        <li><a href="{{ route('students.photos', $student->id) }}" class="button secondary">Photos</a></li>
    </ul>

    {{ Form::model(['route' => ['students.updateEnrollment', $enrollment->id], 'method' => 'post']) }}
    @include("students/_enrollment_form")
    {{ Form::close() }}
</div>
@stop
