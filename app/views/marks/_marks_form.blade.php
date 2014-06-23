{{ Form::hidden('academic_session_id', $input['academic_session_id']) }}
{{ Form::hidden('class_room_id', $input['class_room_id']) }}
{{ Form::hidden('subject_id', $input['subject_id']) }}
{{ Form::hidden('assessment_id', $input['assessment_id']) }}

{{ Form::label('test_id', 'Test', ['class' => ($errors->has('test_id') ? 'error' : '')]) }}

{{ Form::select('test_id', $tests, null, ['class' => $errors->has('test_id') ? 'error' : '']) }}

@if($errors->has('test_id'))
<small class="error">{{ $errors->first('test_id') }}</small>
@endif

<table class="small-12">
   <thead>
      <tr>
         <th class="small-1">Roll No</th>
         <th class="small-4">Name</th>
         <th class="small-1">Mark</th>
         <th class="small-5">Remarks</th>
      </tr>
   </thead>
   <tbody>
   @foreach ($students as $key => $student)
      <tr>
         <td>{{ $student->rollNo }}</td>
         <td>{{ $student->name }}</td>
         <td>
            <input data-tooltip
               title="{{ $errors->has("mark.{$student->id}") ? 'This field is required and must be numeric' : '' }}"
               class="{{ $errors->has("mark.{$student->id}") ? 'has-tip error' : '' }}"
               type="number"
               name="mark[{{ $student->id }}]"
               min="0"
               value="{{ Input::old("mark.{$student->id}", 0) }}"/>
         </td>
         <td>{{ Form::text("remarks[$student->id]", Input::old("remarks.{$student->id}", null), ['placeholder' => 'Optional']) }}</td>
      </tr>
   @endforeach
   </tbody>
</table>

{{ Form::textarea('note', Input::old('note', null), ['placeholder' => 'Optional note', 'rows' => 3]) }}

<hr>
<div class="medium-12 text-right">
   {{ Form::button('Submit', ['class' => 'large button success', 'type' => 'submit']) }}
</div>