@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Add Measurement', 'crumbs' => ['Students' => route('students.index')] ] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>

    @include( 'students._submenu', ['active' => 'measurements'])

    {{ Form::open(['route' => ['students.storeMeasurement', $student->id], 'method' => 'post']) }}
    @include("students/_measurement_form")
    {{ Form::close() }}
</div>
@stop
