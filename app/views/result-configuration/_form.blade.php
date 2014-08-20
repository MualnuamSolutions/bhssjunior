<div class="row">
    <div class="medium-6 columns">
        {{ Form::label('academic_session_id', 'Academic Session', ['class' => ($errors->has('academic_session_id')?'error':'')]) }}
        {{ Form::select('academic_session_id', $academic_sessions, null, ['class' => $errors->has('academic_session_id')?'error':'']) }}
        @if($errors->has('academic_session_id'))
        <small class="error">{{ $errors->first('academic_session_id') }}</small>
        @endif
    </div>
</div>

<div class="row">
    <div class="medium-6 columns">
        <fieldset>
            <legend>Weightage</legend>

            @foreach($assessments as $assessment)
            {{ Form::label('assessment_' . $assessment->id, "{$assessment->short_name} Weightage", ['class' => ($errors->has('assessment.' . $assessment->id)?'error':'')]) }}

            <div class="row collapse">
                <div class="small-10 medium-10 columns">
                    {{ Form::text("assessment[{$assessment->id}]", $assessment->weightage, ['class' => $errors->has('assessment.' . $assessment->id)?'error':'', 'id' => 'assessment_' . $assessment->id]) }}
                </div>
                <div class="small-2 medium-2 columns">
                    <span class="postfix"> / 100</span>
                </div>
            </div>
            @if($errors->has('assessment.' . $assessment->id))
            <small class="error">{{ $errors->first('assessment.' . $assessment->id) }}</small>
            @endif
            @endforeach

        </fieldset>
    </div>

    <div class="medium-6 columns">
        <fieldset>
            <legend>Grade Marks</legend>

            {{ Form::label('grade_a', 'Grade A', ['class' => ($errors->has('grade_a')?'error':'')]) }}
            {{ Form::text('grade_a', Option::data('grade_a'), ['class' => $errors->has('grade_a')?'error':'']) }}
            @if($errors->has('grade_a'))
            <small class="error">{{ $errors->first('grade_a') }}</small>
            @endif

            {{ Form::label('grade_b', 'Grade B', ['class' => ($errors->has('grade_b')?'error':'')]) }}
            {{ Form::text('grade_b', Option::data('grade_b'), ['class' => $errors->has('grade_b')?'error':'']) }}
            @if($errors->has('grade_b'))
            <small class="error">{{ $errors->first('grade_b') }}</small>
            @endif

            {{ Form::label('grade_c', 'Grade C', ['class' => ($errors->has('grade_c')?'error':'')]) }}
            {{ Form::text('grade_c', Option::data('grade_c'), ['class' => $errors->has('grade_c')?'error':'']) }}
            @if($errors->has('grade_c'))
            <small class="error">{{ $errors->first('grade_c') }}</small>
            @endif

            {{ Form::label('grade_d', 'Grade D', ['class' => ($errors->has('grade_d')?'error':'')]) }}
            {{ Form::text('grade_d', Option::data('grade_d'), ['class' => $errors->has('grade_d')?'error':'']) }}
            @if($errors->has('grade_d'))
            <small class="error">{{ $errors->first('grade_d') }}</small>
            @endif

            {{ Form::label('grade_o', 'O Grade', ['class' => ($errors->has('grade_o')?'error':'')]) }}
            {{ Form::text('grade_o', Option::data('grade_o'), ['class' => $errors->has('grade_o')?'error':'']) }}
            @if($errors->has('grade_o'))
            <small class="error">{{ $errors->first('grade_o') }}</small>
            @endif
        </fieldset>
    </div>

</div>


<div class="row">
    <div class="small-12 columns text-right">
        <hr>
        {{ Form::button('Submit', ['class' => 'button large success', 'type' => 'submit']) }}
    </div>
</div>

@section('styles')
@stop

@section('scripts')

@stop
