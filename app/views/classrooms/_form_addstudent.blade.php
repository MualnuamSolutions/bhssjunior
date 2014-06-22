<div class="row">
   <div class="medium-6 columns">
      {{ Form::label('name', 'Class Name', ['class' => ($errors->has('name')?'error':'')]) }}

      {{ Form::text('name', null, ['class' => $errors->has('name')?'error':'']) }}

      @if($errors->has('name'))
      <small class="error">{{ $errors->first('name') }}</small>
      @endif
   </div>

   <div class="medium-6 columns">
      {{ Form::label('subjects', 'Subjects', ['class' => ($errors->has('subject')?'error':'')]) }}

      {{ Form::select('subjects[]', $subjects, (isset($classroom) ? array_pluck($classroom->subjects, 'id') : null), [ 'class' => 'chosen-select ' . ($errors->has('name')?'error':''), 'data-placeholder' => 'Choose subjects', 'multiple']) }}

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
