@extends('layout')

@section('content')

@include( 'partials.crumbs', ['current' => 'Change Password', 'crumbs' => ['Users' => route('users.index'), $user->name => route('users.edit', $user->id)]] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Change Password - {{ $user->name }}</h5>
    <hr>

    <div class="row">
        <div class="small-6 columns small-offset-3">

            {{ Form::open(['route' => ['users.updatePassword', $user->id], 'method' => 'post']) }}
                {{ Form::label('password', 'Password', ['class' => $errors->has('password')?'error':'']) }}
                {{ Form::password('password', ['placeholder' => 'Password for login', 'class' =>
                $errors->has('password')?'error':'']) }}

                @if($errors->has('password'))
                <small class="error">{{ $errors->first('password') }}</small>
                @endif

                {{ Form::label('password_confirmation', 'Confirm Password', ['class' =>
                $errors->has('password_confirmation')?'error':'']) }}
                {{ Form::password('password_confirmation', ['placeholder' => 'Confirm password for login', 'class' =>
                $errors->has('password_confirmation')?'error':'']) }}

                @if($errors->has('password_confirmation'))
                <small class="error">{{ $errors->first('password_confirmation') }}</small>
                @endif

                <hr/>
                <div class="row">
                    <div class="large-12 columns text-right">
                        {{ Form::button('Submit', ['class' => 'button large success', 'type' => 'submit']) }}
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
