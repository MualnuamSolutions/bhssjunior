<div class="row">
    <div class="small-12 columns">
        <fieldset>
            <legend>New Measurement</legend>

            <div class="row">
                <div class="small-3 columns">
                    {{ Form::label('academic_session_id', 'Academic Session', ['class' => ($errors->has('academic_session_id') ? 'error' : '')]) }}
                    {{ Form::select('academic_session_id', $academicSessions, AcademicSession::currentSession()->id, ['class' => $errors->has('academic_session_id')?'error':'']) }}
                    @if($errors->has('academic_session_id'))
                    <small class="error">{{ $errors->first('academic_session_id') }}</small>
                    @endif
                </div>

                <div class="small-3 columns">
                    {{ Form::label('height', 'Height', ['class' => ($errors->has('height')?'error':'')]) }}
                    {{ Form::text('height', null, ['class' => $errors->has('height')?'error':'']) }}
                    @if($errors->has('height'))
                    <small class="error">{{ $errors->first('height') }}</small>
                    @endif
                </div>

                <div class="small-3 columns">
                    {{ Form::label('weight', 'Weight', ['class' => ($errors->has('weight')?'error':'')]) }}
                    {{ Form::text('weight', null, ['class' => $errors->has('weight')?'error':'']) }}
                    @if($errors->has('weight'))
                    <small class="error">{{ $errors->first('weight') }}</small>
                    @endif
                </div>

                <div class="small-3 columns">
                    {{ Form::label('created_at', 'Entry Date', ['class' => ($errors->has('created_at')?'error':'')]) }}
                    {{ Form::text('created_at', date('Y-m-d'), ['readonly' => 'readonly', 'placeholder' => 'Pick date', 'class' => 'fdatepicker' . ($errors->has('created_at') ? ' error' : '')]) }}
                    @if($errors->has('created_at'))
                    <small class="error">{{ $errors->first('created_at') }}</small>
                    @endif
                </div>
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
