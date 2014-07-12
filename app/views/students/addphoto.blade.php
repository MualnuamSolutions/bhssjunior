@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Add Photo', 'crumbs' => ['Students' => route('students.index')]] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>
    <ul class="button-group">
        <li><a href="{{ route('students.edit', $student->id) }}" class="button secondary">Profile</a></li>
        <li><a href="{{ route('students.enrollments', $student->id) }}" class="button secondary">Enrollments</a></li>
        <li><a href="{{ route('students.photos', $student->id) }}" class="button">Photos</a></li>
    </ul>


    {{ Form::open(['route' => ['students.storePhoto', $student->id], 'method' => 'post']) }}
    @include("students/_photo_form")
    {{ Form::close() }}
</div>
@stop
