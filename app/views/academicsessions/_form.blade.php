<div class="row">
   <div class="medium-6 columns">
      {{ Form::label('start', 'Session Start', ['class' => ($errors->has('start')?'error':'')]) }}

      {{ Form::text('start', null, ['class' => $errors->has('start')?'error':'']) }}

      @if($errors->has('start'))
      <small class="error">{{ $errors->first('start') }}</small>
      @endif
   </div>
   <div class="medium-6 columns">
      {{ Form::label('end', 'Session End', ['class' => ($errors->has('end')?'error':'')]) }}

      {{ Form::text('end', null, ['class' => $errors->has('end')?'error':'']) }}

      @if($errors->has('end'))
      <small class="error">{{ $errors->first('end') }}</small>
      @endif
   </div>
</div>


<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'small', 'type' => 'submit']) }}
   </div>
</div>
