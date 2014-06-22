@extends('layout')

@section('content')

   @include( 'partials.crumbs', ['current' => 'Create New User', 'crumbs' => ['Users' => route('users.index')] ] )

   <div class="panel">
      <h5><i class="fi-page-add"></i> Create New User</h5>
      <hr>

      @include("users/_form")

   </div>
@stop
