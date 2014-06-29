{{ Form::label('academic_session_id', 'Academic Session', ['class' => ($errors->has('academic_session_id') ? 'error' : '')]) }}

{{ Form::select('academic_session_id', $academicSessions, Input::get('academic_session_id', null), ['class' => $errors->has('academic_session_id') ? 'error' : '']) }}

@if($errors->has('academic_session_id'))
<small class="error">{{ $errors->first('academic_session_id') }}</small>
@endif

{{ Form::label('class_room_id', 'Class', ['class' => ($errors->has('class_room_id') ? 'error' : '')]) }}

{{ Form::select('class_room_id', $classes, Input::get('class_room_id', 4), ['class' => $errors->has('class_room_id') ? 'error' : '']) }}

@if($errors->has('class_room_id'))
<small class="error">{{ $errors->first('class_room_id') }}</small>
@endif

{{ Form::label('subject_id', 'Subject', ['class' => ($errors->has('subject_id') ? 'error' : '')]) }}

{{ Form::select('subject_id', [], Input::get('subject_id', null), ['class' => $errors->has('subject_id') ? 'error' : '']) }}

@if($errors->has('subject_id'))
<small class="error">{{ $errors->first('subject_id') }}</small>
@endif

{{ Form::label('assessment_id', 'Assessment', ['class' => ($errors->has('assessment_id') ? 'error' : '')]) }}

{{ Form::select('assessment_id', $assessments, Input::get('assessment_id', null), ['class' => $errors->has('assessment_id') ? 'error' : '']) }}

@if($errors->has('assessment_id'))
<small class="error">{{ $errors->first('assessment_id') }}</small>
@endif

{{ Form::button('Load Entry Form', ['class' => 'medium button success', 'type' => 'submit']) }}

<hr>