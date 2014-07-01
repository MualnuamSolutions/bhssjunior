@extends('layout')

@section('content')

@include( 'partials.crumbs', ['current' => 'Change Password', 'crumbs' => ['Users' => route('users.index'), $user->name => route('users.edit', $user->id)]] )

<div class="panel">
   <h5><i class="fi-page-edit"></i> Change Password - {{ $user->name }}</h5>
   <hr>
   {{ Form::open(['route' => ['users.updatePassword', $user->id], 'method' => 'post']) }}
   @include("users/_form", ['action' => 'password'])
   {{ Form::close() }}
</div>
@stop
