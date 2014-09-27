@extends('layout')

@section('content')

@include('partials.crumbs', ['current' => 'Edit Exam Marks Entry', 'crumbs' => ['Exams' => route('exams.index')]])

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Exam Marks Entry</h5>
    <hr>
    {{ Form::model($exam, ['route' => ['exams.update', $exam->id], 'method' => 'put']) }}
        <div class="row">
            <div class="medium-3 columns">

                {{ Form::label('academic_session_id', 'Academic Session', ['class' => ($errors->has('academic_session_id') ? 'error' : '')]) }}
                @if(false && $logged_user->inGroup($adminGroup))
                {{ Form::select('academic_session_id', $academicSessions, Input::get('academic_session_id', $exam->academicSession->id), ['class' => $errors->has('academic_session_id') ? 'error' : '']) }}
                @else
                <input type="text" disabled="disabled" value="{{ $exam->academicSession->session }}"/>
                @endif

                {{ Form::label('assessment_id', 'Assessment', ['class' => ($errors->has('assessment_id') ? 'error' : '')]) }}
                @if(false && $logged_user->inGroup($adminGroup))
                {{ Form::select('assessment_id', $assessments, Input::get('assessment_id', Option::data('current_assessment', $exam->test->assessment->id)), ['class' => $errors->has('assessment_id') ? 'error' : '']) }}
                @else
                <input type="text" disabled="disabled" value="{{ $exam->test->assessment->name }}"/>
                @endif

                {{ Form::label('class_room_id', 'Class', ['class' => ($errors->has('class_room_id') ? 'error' : '')]) }}
                @if(false && $logged_user->inGroup($adminGroup))
                {{ Form::select('class_room_id', ['' => 'Select Class'] + $classes, Input::get('class_room_id', $exam->classRoom->id), ['class' => $errors->has('class_room_id') ? 'error' : '']) }}
                @else
                <input type="text" disabled="disabled" value="{{ $exam->classRoom->name }}"/>
                @endif

                {{ Form::label('subject_id', 'Subject', ['class' => ($errors->has('subject_id') ? 'error' : '')]) }}
                @if(false && $logged_user->inGroup($adminGroup))
                {{ Form::select('subject_id', [], Input::get('subject_id', $exam->test->subject->id), ['class' => $errors->has('subject_id') ? 'error' : '']) }}
                @else
                <input type="text" disabled="disabled" value="{{ $exam->test->subject->name }}"/>
                @endif

            </div>
            <div class="medium-9 columns" id="marks-entry-form">
                @include("exams/_form")
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop

@section('scripts')
<script type="text/javascript">
var subject = {{ Input::get('subject_id', $exam->test->subject->id) }};

var classSubjects = {{ $subjects }};

$(function () {
loadSubjects();

if (subject) {
$("#subject_id").val(subject);
}

$("#class_room_id").on('change', function () {
loadSubjects();
});

$("table input:first").focus();

$("#load_entry_form").on('click', function(evt){
if($('#class_room_id').val() == "" || $('#subject_id').val() == "") {
$('#class_room_id, #subject_id').css('border-color', '#cccccc');

if($('#class_room_id').val() == "")
$('#class_room_id').css('border-color', 'red');

if($('#subject_id').val() == "")
$('#subject_id').css('border-color', 'red');

evt.preventDefault(true);
}
});
});

function loadSubjects() {
var options = '<option value="">No Subject</option>';

if ($('#class_room_id').val() != "" && classSubjects[ parseInt($('#class_room_id').val()) - 1 ].subjects.length) {
options = '<option value="">Select Subject</option>';
$.each(classSubjects[ parseInt($('#class_room_id').val()) - 1 ].subjects, function (key, subject) {
options += '<option value="' + subject.id + '">' + subject.name + '</option>';
});
}

$("#subject_id").html(options);
}
</script>
@stop