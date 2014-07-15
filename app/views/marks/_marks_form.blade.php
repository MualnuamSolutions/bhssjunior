{{ Form::hidden('academic_session_id', $input['academic_session_id']) }}
{{ Form::hidden('class_room_id', $input['class_room_id']) }}
{{ Form::hidden('subject_id', $input['subject_id']) }}
{{ Form::hidden('assessment_id', $input['assessment_id']) }}

<div class="row">
    <div class="medium-4 columns">
        {{ Form::label('test_id', 'Test', ['tabIndex' => 1, 'class' => ($errors->has('test_id') ? 'error' : '')]) }}
        {{ Form::select('test_id', $tests, null, ['tabIndex' => 1, 'class' => $errors->has('test_id') ? 'error' : '']) }}

        @if($errors->has('test_id'))
        <small class="error">{{ $errors->first('test_id') }}</small>
        @endif
    </div>

    <div class="medium-5 columns">
        {{ Form::label('name', 'Test Name', ['class' => ($errors->has('name') ? 'error' : '')]) }}
        {{ Form::text('name', null, ['tabIndex' => 2, 'class' => $errors->has('name') ? 'error' : '']) }}

        @if($errors->has('name'))
        <small class="error">{{ $errors->first('name') }}</small>
        @endif
    </div>

    <div class="medium-3 columns">
        {{ Form::label('exam_date', 'Exam Date', ['class' => ($errors->has('exam_date') ? 'error' : '')]) }}
        {{ Form::text('exam_date', date('Y-m-d'), ['tabIndex' => 3, 'class' => 'fdatepicker ' . ($errors->has('exam_date') ? 'error' : '')]) }}

        @if($errors->has('exam_date'))
        <small class="error">{{ $errors->first('exam_date') }}</small>
        @endif
    </div>
</div>

<table class="small-12">
    <thead>
    <tr>
        <th class="small-1">R.No</th>
        <th class="small-5">Name</th>
        <th class="small-2">Mark</th>
        <th class="small-4">Remarks</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($enrollments as $key => $enrollment)
        <tr>
            <td>{{ $enrollment->roll_no }}</td>
            <td>{{ $enrollment->student->name }}</td>
            <td>
                <input
                    {{ $errors->has("mark.{$enrollment->student->id}") ? "data-tooltip" : "" }}
                    title="{{ $errors->has("mark.{$enrollment->student->id}") ? 'This field is required and must be numeric' : '' }}"
                    class="{{ $errors->has("mark.{$enrollment->student->id}") ? 'has-tip error' : '' }}"
                    type="number"
                    name="mark[{{ $enrollment->student->id }}]"
                    tabIndex="{{ $key+4 }}"
                    min="0"
                    step="any"
                    value="{{ Input::old("mark.{$enrollment->student->id}", 0) }}"/>
            </td>
            <td>{{ Form::text("remarks[$enrollment->student_id]", Input::old("remarks.{$enrollment->student_id}", null), ['tabIndex' => ($key+$enrollments->count()+4), 'placeholder' => 'Optional']) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ Form::textarea('note', Input::old('note', null), ['tabIndex' => ($enrollments->count()*2+5), 'placeholder' => 'Optional note', 'rows' => 3]) }}

<hr>
<div class="medium-12 text-right">
    {{ Form::button('Submit', ['class' => 'large button success', 'type' => 'submit', 'tabIndex' => ($enrollments->count()*2+6)]) }}
</div>