@extends('layout')

@section('alert')
   @include('partials.alert')
@stop

@section('title')
   <h4><i class="fi-shield"></i> Login</h4>
@stop

@section('content')
   {{ Form::open(['url' => route('user.login'), 'method' => 'post']) }}
   <fieldset>
      <div class="row">
         <div class="large-6 medium-6 columns">
            <div class="row collapse">
               <div class="small-1 columns">
                  <span class="prefix"><i class="fi-at-sign"></i></span>
               </div>
               <div class="small-11 columns">
                  {{ Form::text('email', '', ['placeholder' => 'Email Address', 'class' => $errors->has('email')?'error':'']) }}
               </div>
            </div>
            @if($errors->has('email'))
            <small class="error">{{ $errors->first('email') }}</small>
            @endif

            <div class="row collapse">
               <div class="small-1 columns">
                  <span class="prefix"><i class="fi-key"></i></span>
               </div>
               <div class="small-11 columns">
                  {{ Form::password('password', ['placeholder' => 'Password', 'class' => $errors->has('password')?'error':'']) }}
               </div>
            </div>
            @if($errors->has('password'))
            <small class="error">{{ $errors->first('password') }}</small>
            @endif
         </div>
      </div>
      <div class="row">
         <div class="large-6 medium-6 columns text-right">
            {{ Form::button('Login <i class="fi-"></i>', ['class' => 'small ', 'type' => 'submit']) }}
         </div>
      </div>
   </fieldset>
   {{ Form::close() }}
@stop
