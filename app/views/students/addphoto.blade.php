@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Add Photo', 'crumbs' => ['Students' => route('students.index')]] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>

    @include( 'students._submenu', ['active' => 'photos'])

    {{ Form::open(['route' => ['students.storePhoto', $student->id], 'method' => 'post']) }}
    @include("students/_photo_form")
    {{ Form::close() }}
</div>
@stop
