<div class="row">
   <div class="medium-6 medium-offset-3 columns">
      {{ Form::label('name', 'Name', ['class' => ($errors->has('name')?'error':'')]) }}

      {{ Form::text('name', null, ['placeholder' => 'Name of subject', 'class' => $errors->has('name')?'error':'']) }}

      @if($errors->has('name'))
      <small class="error">{{ $errors->first('name') }}</small>
      @endif
   </div>
</div>

<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'button large success', 'type' => 'submit']) }}
   </div>
</div>
