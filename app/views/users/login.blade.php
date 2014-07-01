@extends('layout')

@section('content')
<div class="row">
   <div class="large-4 medium-4 large-offset-4 medium-offset-4 columns">
      <h4><i class="fi-key"></i> Login</h4>
   </div>
</div>
{{ Form::open(['url' => route('login'), 'method' => 'post']) }}
<div class="row">
   <div class="large-4 medium-4 large-offset-4 medium-offset-4 columns">
      <div class="row collapse">
         <div class="small-2 columns">
            <span class="prefix"><i class="fi-at-sign"></i></span>
         </div>
         <div class="small-10 columns">
            {{ Form::text('email', '', ['placeholder' => 'Email Address', 'class' => $errors->has('email')?'error':''])
            }}
         </div>
      </div>
      @if($errors->has('email'))
      <small class="error">{{ $errors->first('email') }}</small>
      @endif

      <div class="row collapse">
         <div class="small-2 columns">
            <span class="prefix"><i class="fi-key"></i></span>
         </div>
         <div class="small-10 columns">
            {{ Form::password('password', ['placeholder' => 'Password', 'class' => $errors->has('password')?'error':''])
            }}
         </div>
      </div>
      @if($errors->has('password'))
      <small class="error">{{ $errors->first('password') }}</small>
      @endif
   </div>
</div>
<div class="row">
   <div class="large-4 medium-4 large-offset-4 medium-offset-4 columns text-right">
      {{ Form::button('Login <i class="fi-"></i>', ['class' => 'small ', 'type' => 'submit']) }}
   </div>
</div>
{{ Form::close() }}
@stop
