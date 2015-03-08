<div class="row">
   <div class="medium-6 columns">
      {{ Form::label('site_title', 'Software Title', ['class' => ($errors->has('site_title')?'error':'')]) }}
      {{ Form::text('site_title', null, ['placeholder' => 'Name of the software', 'class' => $errors->has('site_title')?'error':'']) }}

      @if($errors->has('site_title'))
      <small class="error">{{ $errors->first('site_title') }}</small>
      @endif

      {{ Form::label('school_name', 'School Name', ['class' => ($errors->has('school_name')?'error':'')]) }}
      {{ Form::text('school_name', null, ['placeholder' => 'Name of the school', 'class' => $errors->has('school_name')?'error':'']) }}

      @if($errors->has('school_name'))
      <small class="error">{{ $errors->first('school_name') }}</small>
      @endif

      {{ Form::label('item_per_page', 'Item Per Page', ['class' => ($errors->has('item_per_page')?'error':'')]) }}
      {{ Form::text('item_per_page', null, ['placeholder' => 'No of item per page', 'class' => $errors->has('item_per_page')?'error':'']) }}

      @if($errors->has('item_per_page'))
      <small class="error">{{ $errors->first('item_per_page') }}</small>
      @endif

      {{ Form::label('current_session', 'Current Session', ['class' => ($errors->has('current_session')?'error':'')]) }}
      {{ Form::select('current_session', $academicSessions, null, ['class' => $errors->has('current_session')?'error':'']) }}
      @if($errors->has('current_session'))
      <small class="error">{{ $errors->first('current_session') }}</small>
      @endif

      {{ Form::label('current_assessment', 'Current Assessment', ['class' => ($errors->has('current_assessment')?'error':'')]) }}
      {{ Form::select('current_assessment', $assessments, null, ['class' => $errors->has('current_assessment')?'error':'']) }}
      @if($errors->has('current_assessment'))
      <small class="error">{{ $errors->first('current_assessment') }}</small>
      @endif
   </div>

   <div class="medium-6 columns">
      {{ Form::label('grade_o', 'Grade O', ['class' => ($errors->has('grade_o')?'error':'')]) }}
      {{ Form::text('grade_o', null, ['placeholder' => 'Point equivalent for grade O', 'class' => $errors->has('grade_o')?'error':'']) }}

      @if($errors->has('grade_o'))
      <small class="error">{{ $errors->first('grade_o') }}</small>
      @endif

      {{ Form::label('grade_a', 'Grade A', ['class' => ($errors->has('grade_a')?'error':'')]) }}
      {{ Form::text('grade_a', null, ['placeholder' => 'Point equivalent for grade A', 'class' => $errors->has('grade_a')?'error':'']) }}

      @if($errors->has('grade_a'))
      <small class="error">{{ $errors->first('grade_a') }}</small>
      @endif

      {{ Form::label('grade_b', 'Grade B', ['class' => ($errors->has('grade_b')?'error':'')]) }}
      {{ Form::text('grade_b', null, ['placeholder' => 'Point equivalent for grade B', 'class' => $errors->has('grade_b')?'error':'']) }}

      @if($errors->has('grade_b'))
      <small class="error">{{ $errors->first('grade_b') }}</small>
      @endif

      {{ Form::label('grade_c', 'Grade C', ['class' => ($errors->has('grade_c')?'error':'')]) }}
      {{ Form::text('grade_c', null, ['placeholder' => 'Point equivalent for grade C', 'class' => $errors->has('grade_c')?'error':'']) }}

      @if($errors->has('grade_c'))
      <small class="error">{{ $errors->first('grade_c') }}</small>
      @endif

      {{ Form::label('grade_d', 'Grade D', ['class' => ($errors->has('grade_d')?'error':'')]) }}
      {{ Form::text('grade_d', null, ['placeholder' => 'Point equivalent for grade D', 'class' => $errors->has('grade_d')?'error':'']) }}

      @if($errors->has('grade_d'))
      <small class="error">{{ $errors->first('grade_d') }}</small>
      @endif
   </div>

</div>

<div class="row">
   <div class="medium-12 columns">
      <hr>

      <div class="row">
         <div class="medium-6 columns">
            {{ Form::label('school_head_name', 'Name of School Head', ['class' => ($errors->has('school_head_name')?'error':'')]) }}
            {{ Form::text('school_head_name', null, ['placeholder' => 'Name of the school head', 'class' => $errors->has('school_head_name')?'error':'']) }}

            @if($errors->has('school_head_name'))
            <small class="error">{{ $errors->first('school_head_name') }}</small>
            @endif
         </div>
         <div class="medium-6 columns">
            {{ Form::label('school_head_designation', 'School Head Designation', ['class' => ($errors->has('school_head_designation')?'error':'')]) }}
            {{ Form::text('school_head_designation', null, ['placeholder' => 'Principal/Vice Principal/Headmaster', 'class' => $errors->has('school_head_designation')?'error':'']) }}

            @if($errors->has('school_head_designation'))
            <small class="error">{{ $errors->first('school_head_designation') }}</small>
            @endif
         </div>
      </div>

   </div>
</div>

<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'button large success', 'type' => 'submit']) }}
   </div>
</div>
