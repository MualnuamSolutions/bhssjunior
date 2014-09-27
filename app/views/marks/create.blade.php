@extends('layout')

@section('content')
@include('partials.crumbs', ['current' => 'Exam Mark Entry', 'crumbs' => ['Exams' => route('exams.index')]])

<div class="panel">
   <h5><i class="fi-page-add"></i> Exam Mark Entry</h5>
   <hr>
   <div class="row">
      <div class="medium-3 columns">
         {{ Form::open(['route' => 'marks.create', 'method' => 'get']) }}
         @include("marks/_form")
         {{ Form::close() }}
      </div>
      <div class="medium-9 columns" id="marks-entry-form">
         @if($locked)
         @include("marks/_locked_test")
         @else
             {{ Form::open(['route' => 'marks.store', 'method' => 'post']) }}
             @if (!empty($tests))
             @include("marks/_marks_form")
             @else
             @include("marks/_no_test")
             @endif
             {{ Form::close() }}
         @endif
      </div>
   </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
var subject = {{ Input::get('subject_id', 0) }};

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