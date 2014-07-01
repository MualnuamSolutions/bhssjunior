@extends('layout')

@section('content')
<div class="panel">
   <h5><i class="fi-page-edit"></i> Edit Academic Session</h5>
   <hr>
   {{ Form::model($academicsession, ['route' => ['academicsessions.update', $academicsession->id], 'method' => 'put'])
   }}
   @include("academicsessions/_form")
   {{ Form::close() }}
</div>
@stop
