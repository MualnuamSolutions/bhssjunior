<div class="row">
    <div class="small-12 columns">
        <fieldset>
            <legend>New Enrollment</legend>

            <div class="row">
                <div class="small-4 columns">
                    {{ Form::label('academic_session_id', 'Academic Session', ['class' => ($errors->has('academic_session_id') ? 'error' : '')]) }}
                    {{ Form::select('academic_session_id', $academicSessions, null, ['class' => $errors->has('academic_session_id')?'error':'']) }}
                    @if($errors->has('academic_session_id'))
                    <small class="error">{{ $errors->first('academic_session_id') }}</small>
                    @endif
                </div>

                <div class="small-4 columns">
                    {{ Form::label('class_room_id', 'Class', ['class' => ($errors->has('class_room_id') ? 'error' : '')]) }}
                    {{ Form::select('class_room_id', $classRooms, null, ['class' => $errors->has('class_room_id')?'error':'']) }}
                    @if($errors->has('class_room_id'))
                    <small class="error">{{ $errors->first('class_room_id') }}</small>
                    @endif
                </div>

                <div class="small-4 columns">
                    {{ Form::label('roll_no', 'Roll No', ['class' => ($errors->has('roll_no')?'error':'')]) }}
                    {{ Form::text('roll_no', null, ['class' => $errors->has('roll_no')?'error':'']) }}
                    @if($errors->has('roll_no'))
                    <small class="error">{{ $errors->first('roll_no') }}</small>
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
