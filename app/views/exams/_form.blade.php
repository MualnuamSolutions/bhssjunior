{{ Form::hidden('test_id', $exam->test_id) }}
<table class="small-12">
   <thead>
      <tr>
         <th class="small-1">Roll No</th>
         <th class="small-4">Name</th>
         <th class="small-1">Mark</th>
         <th class="small-5">Remarks</th>
      </tr>
   </thead>
   <tbody>
   @foreach ($exam->marks as $key => $mark)
   <tr>
      <td>{{ $mark->student->rollNo }}</td>
      <td>{{ $mark->student->name }}</td>
      <td>
         <input data-tooltip
            title="{{ $errors->has("mark.{$mark->student_id}") ? 'This field is required and must be numeric' : '' }}"
            class="has-tip {{ $errors->has("mark.{$mark->student_id}") ? 'error' : '' }}"
            type="number"
            tabIndex="{{ $key+1 }}"
            name="mark[{{ $mark->student_id }}]"
            min="0"
            value="{{ Input::old("mark.{$mark->student_id}", $mark->mark) }}"/>
      </td>
      <td>{{ Form::text("remarks[$mark->student_id]", Input::old("remarks.{$mark->student_id}", $mark->remarks), ['placeholder' => 'Optional']) }}</td>
   </tr>
   @endforeach
   </tbody>
</table>

{{ Form::textarea('note', Input::old('note', $exam->note), ['placeholder' => 'Optional note', 'rows' => 3]) }}

<hr>
<div class="medium-12 text-right">
   {{ Form::button('Submit', ['class' => 'large button success', 'type' => 'submit']) }}
</div>