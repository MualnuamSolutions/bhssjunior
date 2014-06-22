<div class="row">
   <div class="medium-4 columns">
      {{ Form::label('name', 'Test Name', ['class' => ($errors->has('name') ? 'error' : '')]) }}

      {{ Form::text('name', null, ['class' => $errors->has('name') ? 'error' : '']) }}

      @if($errors->has('name'))
      <small class="error">{{ $errors->first('name') }}</small>
      @endif
   </div>
   <div class="medium-3 columns">
      {{ Form::label('assessment_id', 'Assessment', ['class' => ($errors->has('assessment_id') ? 'error' : '')]) }}

      {{ Form::select('assessment_id', $assessments, null, ['class' => $errors->has('assessment_id') ? 'error' : '']) }}

      @if($errors->has('assessment_id'))
      <small class="error">{{ $errors->first('assessment_id') }}</small>
      @endif
   </div>
   <div class="medium-3 columns">
      {{ Form::label('subject_id', 'Subject', ['class' => ($errors->has('subject_id') ? 'error' : '')]) }}

      {{ Form::select('subject_id', $subjects, null, ['class' => $errors->has('subject_id') ? 'error' : '']) }}

      @if($errors->has('subject_id'))
      <small class="error">{{ $errors->first('subject_id') }}</small>
      @endif
   </div>
   <div class="medium-2 columns">
      {{ Form::label('totalmarks', 'Total Marks', ['class' => ($errors->has('totalmarks')?'error':'')]) }}

      {{ Form::text('totalmarks', 10, ['class' => $errors->has('totalmarks')?'error':'']) }}

      @if($errors->has('totalmarks'))
      <small class="error">{{ $errors->first('totalmarks') }}</small>
      @endif
   </div>
</div>

<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'large button success', 'type' => 'submit']) }}
   </div>
</div>
