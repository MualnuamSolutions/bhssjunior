<div class="row">
   <div class="medium-6 columns">
      {{ Form::label('name', 'Name', ['class' => ($errors->has('name')?'error':'')]) }}
      {{ Form::text('name', null, ['placeholder' => 'Name of subject', 'class' => $errors->has('name')?'error':'']) }}
      @if($errors->has('name'))
      <small class="error">{{ $errors->first('name') }}</small>
      @endif
   </div>
   <div class="medium-6 columns">
      {{ Form::label('type', 'Type', ['class' => ($errors->has('type')?'error':'')]) }}
      {{ Form::select('type', array('Full Paper' => 'Full Paper', 'Half Paper' => 'Half Paper') , ['class' => $errors->has('type')?'error':'']) }}
      @if($errors->has('type'))
      <small class="error">{{ $errors->first('type') }}</small>
      @endif
   </div>
</div>

<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'button large success', 'type' => 'submit']) }}
   </div>
</div>
