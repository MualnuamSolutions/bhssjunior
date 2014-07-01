<div class="row">
   <div class="medium-4 columns">
      {{ Form::label('term', 'Term', ['class' => ($errors->has('term') ? 'error' : '')]) }}

      {{ Form::select('term', Assessment::$terms, null, ['class' => $errors->has('term') ? 'error' : '']) }}

      @if($errors->has('term'))
      <small class="error">{{ $errors->first('term') }}</small>
      @endif
   </div>
   <div class="medium-6 columns">
      {{ Form::label('name', 'Assessment Name', ['class' => ($errors->has('name') ? 'error' : '')]) }}

      {{ Form::text('name', null, ['class' => $errors->has('name') ? 'error' : '']) }}

      @if($errors->has('name'))
      <small class="error">{{ $errors->first('name') }}</small>
      @endif
   </div>
   <div class="medium-2 columns">
      {{ Form::label('weightage', 'Weightage', ['class' => ($errors->has('weightage')?'error':'')]) }}

      <div class="row collapse">
         <div class="small-10 medium-7 columns">{{ Form::text('weightage', null, ['class' =>
            $errors->has('weightage')?'error':'']) }}
         </div>
         <div class="small-2 medium-5 columns">
            <span class="postfix"> / 100</span>
         </div>
      </div>

      @if($errors->has('weightage'))
      <small class="error">{{ $errors->first('weightage') }}</small>
      @endif
   </div>
</div>


<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'large button success', 'type' => 'submit']) }}
   </div>
</div>
