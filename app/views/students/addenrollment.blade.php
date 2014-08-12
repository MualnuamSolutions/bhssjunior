@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Add Enrollment', 'crumbs' => ['Students' => route('students.index')] ] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>

    @include( 'students._submenu', ['active' => 'enrollments'])

    {{ Form::open(['route' => ['students.storeEnrollment', $student->id], 'method' => 'post']) }}
    @include("students/_enrollment_form")
    {{ Form::close() }}
</div>
@stop
