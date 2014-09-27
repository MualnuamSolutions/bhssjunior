{{ Form::open(['route' => 'results.index', 'method' => 'get', 'class' => 'toolbar']) }}
<div class="row">
    <div class="large-3 columns">
        <div class="row">
            <div class="small-12 columns">
                {{ Form::select('academic_session', $academicSessions, Input::get('academic_session'), ['id' => 'academic_session']) }}
            </div>

            <div class="small-12 columns">
                {{ Form::select('assessment', $assessments, Input::get('assessment'), ['id' => 'assessment']) }}
            </div>
        </div>
    </div>

    <div class="large-4 columns">
        <div class="row">
            <div class="small-12 columns">
                {{ Form::select('class', $classes, Input::get('class'), ['id' => 'class']) }}
            </div>

            @if($students)
            <div class="small-12 columns">
                {{ Form::select('student', array('0' => 'All Students') + $students, Input::get('student'), ['id' => 'student']) }}
            </div>
            @endif
        </div>
    </div>
    <div class="large-5 columns">
        <ul class="button-group">
            <li>
                @if($students)
                {{ Form::button('<i class="fi-eye"></i><br>VIEW', ['class' => 'button large primary', 'type' => 'button', 'onclick' => 'return view()']) }}
                @else
                {{ Form::button('<i class="fi-eye"></i><br>VIEW', ['class' => 'disabled button large primary', 'type' => 'button']) }}
                @endif
            </li>
            <li>
                @if($students)
                {{ Form::button('<i class="fi-print"></i><br>PRINT', ['class' => 'button large success', 'type' => 'button', 'onclick' => 'return prepare()']) }}
                @else
                {{ Form::button('<i class="fi-print"></i><br>PRINT', ['class' => 'disabled button large success', 'type' => 'button']) }}
                @endif
            </li>

            @if($logged_user->hasAccess('results.lock') && $logged_user->hasAccess('results.unlock'))
            <li>
                @if($students)
                    @if($locked)
                    {{ Form::button('<i class="fi-lock"></i><br>UNLOCK', ['class' => 'button large alert', 'type' => 'button', 'onclick' => 'return unlock()']) }}
                    @else
                    {{ Form::button('<i class="fi-lock"></i><br>LOCK', ['class' => 'button large secondary', 'type' => 'button', 'onclick' => 'return lock()']) }}
                    @endif
                @else
                {{ Form::button('<i class="fi-lock"></i><br>LOCK', ['class' => 'disabled button large secondary', 'type' => 'button']) }}
                @endif
            </li>
            @endif
        </ul>
    </div>
</div>
{{ Form::close() }}
