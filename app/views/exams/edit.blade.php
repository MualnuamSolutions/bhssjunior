@extends('layout')

@section('content')
@include('partials.crumbs', ['current' => 'Edit Exam Marks Entry', 'crumbs' => ['Exams' => route('exams.index')]])

<div class="panel">
   <h5><i class="fi-page-edit"></i> Edit Exam Marks Entry</h5>
   <hr>
   <div class="row">
      <div class="medium-3 columns">
         <label for="">Academic Session</label>
         <input type="text" disabled="disabled" value="{{ $exam->academicSession->session }}" />

         <label for="">Class Room</label>
         <input type="text" disabled="disabled" value="{{ $exam->classRoom->name }}" />

         <label for="">Subject</label>
         <input type="text" disabled="disabled" value="{{ $exam->test->subject->name }}" />

         <label for="">Assessment</label>
         <input type="text" disabled="disabled" value="{{ $exam->test->assessment->name }}" />

         <label for="">Test</label>
         <input type="text" disabled="disabled" value="{{ $exam->test->name . ' - ' . $exam->test->totalmarks . ' marks' }}" />
      </div>
      <div class="medium-9 columns" id="marks-entry-form">
         {{ Form::open(['route' => ['exams.update', $exam->id], 'method' => 'put']) }}
         @include("exams/_form")
         {{ Form::close() }}
      </div>
   </div>
</div>
@stop