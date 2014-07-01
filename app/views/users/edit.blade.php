@extends('layout')

@section('content')

@include( 'partials.crumbs', ['current' => 'Edit User', 'crumbs' => ['Users' => route('users.index')]] )

<div class="panel">
   <h5><i class="fi-page-edit"></i> Edit User</h5>
   <hr>
   {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}
   @include("users/_form", ['action' => 'edit'])
   {{ Form::close() }}
</div>
@stop
