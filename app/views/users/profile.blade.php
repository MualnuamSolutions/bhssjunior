@extends('layout')

@section('content')

@include( 'partials.crumbs', ['current' => 'Profile'] )

<div class="panel">
    <h5><i class="fi-torso"></i> Profile</h5>
    <hr>

    {{ Form::model($user, ['route' => ['users.profile'], 'method' => 'post', 'autocomplete' => 'off']) }}
    @include("users/_profile_form")
    {{ Form::close() }}

</div>
@stop
