<div class="row">
   <div class="medium-4 columns">
      {{ Form::label('name', 'Class Name', ['class' => ($errors->has('name')?'error':'')]) }}

      {{ Form::text('name', null, ['class' => $errors->has('name')?'error':'']) }}

      @if($errors->has('name'))
      <small class="error">{{ $errors->first('name') }}</small>
      @endif
   </div>

   <div class="medium-4 columns">
        {{ Form::label('class_teacher1_id', 'Class Teacher', ['class' => ($errors->has('class_teacher1_id')?'error':'')]) }}

        {{ Form::select('class_teacher1_id', $staffs, null, ['class' => $errors->has('class_teacher1_id')?'error':'']) }}

        @if($errors->has('class_teacher1_id'))
        <small class="error">{{ $errors->first('class_teacher1_id') }}</small>
        @endif
   </div>

   <div class="medium-4 columns">
        {{ Form::label('class_teacher2_id', 'Assistant Class Teacher', ['class' => ($errors->has('class_teacher2_id')?'error':'')]) }}

        {{ Form::select('class_teacher2_id', $staffs, null, ['class' => $errors->has('class_teacher2_id')?'error':'']) }}

        @if($errors->has('class_teacher2_id'))
        <small class="error">{{ $errors->first('class_teacher2_id') }}</small>
        @endif
    </div>
</div>

<div class="row">
   <div class="medium-12 columns">
      {{ Form::label('subjects', 'Subjects', ['class' => ($errors->has('subject')?'error':'')]) }}

      {{ Form::select('subjects[]', $subjects, (isset($classroom) ? $classroomSubjects : null), [
      'class' => 'chosen-select chosen-sortable ' . ($errors->has('name')?'error':''), 'data-placeholder' => 'Choose subjects', 'multiple']) }}

      @if($errors->has('subject'))
      <small class="error">{{ $errors->first('subject') }}</small>
      @endif
   </div>
</div>

<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'button large success', 'type' => 'submit']) }}
   </div>
</div>
