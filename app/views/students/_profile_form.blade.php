<div class="row">
   <div class="medium-12 columns">
      <fieldset>
         <legend>Personal Detail</legend>

         <div class="medium-6 columns">
            {{ Form::label('name', 'Name', ['class' => ($errors->has('name')?'error':'')]) }}
            {{ Form::text('name', null, ['class' => $errors->has('name')?'error':'']) }}
            @if($errors->has('name'))
            <small class="error">{{ $errors->first('name') }}</small>
            @endif

            {{ Form::label('gender', 'Gender', ['class' => ($errors->has('gender')?'error':'')]) }}
            {{ Form::select('gender', Student::$genders, null, ['class' => $errors->has('gender')?'error':'']) }}
            @if($errors->has('gender'))
            <small class="error">{{ $errors->first('gender') }}</small>
            @endif

            {{ Form::label('dob', 'Date of Birth', ['class' => ($errors->has('dob')?'error':'')]) }}
            {{ Form::text('dob', null, ['readonly' => 'readonly', 'placeholder' => 'Pick date', 'class' => 'fdatepicker' .
            ($errors->has('dob') ? ' error' : '')]) }}
            @if($errors->has('dob'))
            <small class="error">{{ $errors->first('dob') }}</small>
            @endif

            {{ Form::label('father', 'Father\'s Name', ['class' => ($errors->has('father')?'error':'')]) }}
            {{ Form::text('father', null, ['class' => $errors->has('father')?'error':'']) }}
            @if($errors->has('father'))
            <small class="error">{{ $errors->first('father') }}</small>
            @endif

            {{ Form::label('fathers_occupation', 'Father\'s Occupation', ['class' =>
            ($errors->has('fathers_occupation')?'error':'')]) }}
            {{ Form::text('fathers_occupation', null, ['class' => $errors->has('fathers_occupation')?'error':'']) }}
            @if($errors->has('fathers_occupation'))
            <small class="error">{{ $errors->first('fathers_occupation') }}</small>
            @endif
         </div>

         <div class="medium-6 columns">
            {{ Form::label('mother', 'Mother\'s Name', ['class' => ($errors->has('mother')?'error':'')]) }}
            {{ Form::text('mother', null, ['class' => $errors->has('mother')?'error':'']) }}
            @if($errors->has('mother'))
            <small class="error">{{ $errors->first('mother') }}</small>
            @endif

            {{ Form::label('mothers_occupation', 'Mother\'s Occupation', ['class' =>
            ($errors->has('mothers_occupation')?'error':'')]) }}
            {{ Form::text('mothers_occupation', null, ['class' => $errors->has('mothers_occupation')?'error':'']) }}
            @if($errors->has('mothers_occupation'))
            <small class="error">{{ $errors->first('mothers_occupation') }}</small>
            @endif

            {{ Form::label('contact1', 'Primary Contact', ['class' => ($errors->has('contact1')?'error':'')]) }}
            {{ Form::text('contact1', null, ['class' => $errors->has('contact1')?'error':'']) }}
            @if($errors->has('contact1'))
            <small class="error">{{ $errors->first('contact1') }}</small>
            @endif

            {{ Form::label('contact2', 'Alternate Contact', ['class' => ($errors->has('contact2')?'error':'')]) }}
            {{ Form::text('contact2', null, ['class' => $errors->has('contact2')?'error':'']) }}
            @if($errors->has('contact2'))
            <small class="error">{{ $errors->first('contact2') }}</small>
            @endif

            {{ Form::label('address', 'Address', ['class' => ($errors->has('address')?'error':'')]) }}
            {{ Form::text('address', null, ['class' => $errors->has('address')?'error':'']) }}
            @if($errors->has('address'))
            <small class="error">{{ $errors->first('address') }}</small>
            @endif
         </div>
      </fieldset>
   </div>
</div>


<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'button large success', 'type' => 'submit']) }}
   </div>
</div>

