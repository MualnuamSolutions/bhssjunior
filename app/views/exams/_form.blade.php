{{ Form::hidden('test_id', $exam->test_id) }}
<div class="row">
   <div class="medium-4 columns">
      <label for="">Test</label>
      <input type="text" disabled="disabled"
             value="{{ $exam->test->name . ' - ' . $exam->test->totalmarks . ' marks' }}"/>
   </div>
   <div class="medium-5 columns">
      {{ Form::label('name', 'Test Name', ['class' => ($errors->has('name') ? 'error' : '')]) }}

      @if($locked && $logged_user->inGroup($staffGroup))
        {{ Form::text('name', null, ['disabled'=>'disabled', 'tabIndex' => 1, 'class' => $errors->has('name') ? 'error' : '']) }}
      @else
      {{ Form::text('name', null, ['tabIndex' => 1, 'class' => $errors->has('name') ? 'error' : '']) }}
      @endif

      @if($errors->has('name'))
      <small class="error">{{ $errors->first('name') }}</small>
      @endif
   </div>
   <div class="medium-3 columns">
      {{ Form::label('exam_date', 'Exam Date', ['class' => ($errors->has('exam_date') ? 'error' : '')]) }}

      @if($locked && $logged_user->inGroup($staffGroup))
      {{ Form::text('exam_date', null, ['disabled'=>'disabled', 'tabIndex' => 2, 'class' => 'fdatepicker ' . ($errors->has('exam_date') ? 'error' : '')]) }}
      @else
      {{ Form::text('exam_date', null, ['tabIndex' => 2, 'class' => 'fdatepicker ' . ($errors->has('exam_date') ? 'error' : '')]) }}
      @endif


      @if($errors->has('exam_date'))
      <small class="error">{{ $errors->first('exam_date') }}</small>
      @endif
   </div>
</div>

<table class="small-12">
   <thead>
   <tr>
      <th class="small-1">R.No</th>
      <th class="small-5">Name</th>
      <th class="small-2">Mark</th>
      <th class="small-4">Remarks</th>
   </tr>
   </thead>
   <tbody>
   @foreach ($exam->marks as $key => $mark)
   <tr>
      <td>{{ $mark->student->rollNo }}</td>
      <td>{{ $mark->student->name }}</td>
      <td>
         <input
            {{ ($locked && $logged_user->inGroup($staffGroup)) ? 'disabled="disabled"' : '' }}
            {{ $errors->has("mark.{$mark->student_id}") ? "data-tooltip" : "" }}
            title="{{ $errors->has("mark.{$mark->student_id}") ? 'This field is required and must be numeric' : ''}}"
            class="has-tip {{ $errors->has("mark.{$mark->student_id}") ? 'error' : '' }}"
            type="number"
            tabIndex="{{ $key+3 }}"
            name="mark[{{ $mark->student_id }}]"
            min="0"
            step="any"
            value="{{ Input::old("mark.{$mark->student_id}", $mark->mark) }}"/>
      </td>
      <td>
        @if($locked && $logged_user->inGroup($staffGroup))
        {{ Form::text("remarks[$mark->student_id]", Input::old("remarks.{$mark->student_id}", $mark->remarks), ['disabled'=>'disabled', 'tabIndex' => ($key+$exam->marks->count()+3), 'placeholder' => 'Optional']) }}
        @else
        {{ Form::text("remarks[$mark->student_id]", Input::old("remarks.{$mark->student_id}", $mark->remarks), ['tabIndex' => ($key+$exam->marks->count()+3), 'placeholder' => 'Optional']) }}
        @endif
      </td>
   </tr>
   @endforeach
   </tbody>
</table>

@if($locked && $logged_user->inGroup($staffGroup))
{{ Form::textarea('note', Input::old('note', $exam->note), ['disabled'=>'disabled', 'tabIndex' => ($exam->marks->count()*2+4), 'placeholder' => 'Optional note', 'rows' => 3]) }}
@else
{{ Form::textarea('note', Input::old('note', $exam->note), ['tabIndex' => ($exam->marks->count()*2+4), 'placeholder' => 'Optional note', 'rows' => 3]) }}
@endif

<hr>
@if( !($locked && $logged_user->inGroup($staffGroup)) )
<div class="medium-12 text-right">
   {{ Form::button('Submit', ['tabIndex' => ($exam->marks->count()*2+5), 'class' => 'large button success', 'type' => 'submit']) }}
</div>
@endif