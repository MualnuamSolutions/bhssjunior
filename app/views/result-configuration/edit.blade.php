@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Edit Result Configuration', 'crumbs' => ['Result Configurations' => route('result-configuration.index')] ] )

<div class="panel">

   <h5><i class="fi-page-add"></i> Edit Configuration</h5>
   <hr>
   {{ Form::open(['route' => ['result-configuration.update', $resultConfiguration->id], 'method' => 'put']) }}
   @include("result-configuration._edit_form")
   {{ Form::close() }}
</div>
@stop
