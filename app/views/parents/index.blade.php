@extends('layout')

@section('content')

@if($notfound)
<div class="row">
    <div class="large-12 columns">
        <div data-alert class="alert-box alert">Student not found. Please try again with correct detail.<a href="#" class="close">&times;</a></div>
    </div>
</div>
@endif

@include( 'partials.crumbs', ['current' => 'Parent\'s Dashboard'] )

<div class="panel parent-dashboard">
   <h5><i class="fi-dashboard"></i> Parent's Dashboard</h5>
   <hr>

    @include("parents/_form")

    @if($student)

        @include("parents/_profile")

        @include('parents/_session_detail')

        @if($currentSubject)
        @include("parents/_subject_detail")

        @else
        @include("parents/_subjects")
        @endif


    @endif
</div>
@stop
