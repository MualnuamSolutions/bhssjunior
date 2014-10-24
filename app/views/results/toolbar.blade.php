{{ Form::open(['route' => 'results.index', 'method' => 'get', 'class' => 'toolbar']) }}
<div class="row">
    <div class="medium-3 columns">
        {{ Form::select('academic_session', $academicSessions, Input::get('academic_session'), ['id' => 'academic_session']) }}
    </div>
    <div class="medium-2 columns">
        {{ Form::select('assessment', $assessments, Input::get('assessment'), ['id' => 'assessment']) }}
    </div>
    <div class="medium-3 columns">
        {{ Form::select('class', $classes, Input::get('class'), ['id' => 'class']) }}
    </div>
    <div class="medium-4 columns">
        @if($students)
            {{ Form::select('student', array('0' => 'All Students') + $students, Input::get('student'), ['id' => 'student']) }}
        @endif
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <ul class="button-group left">
            <li>
                @if($students)
                {{ Form::button('<i class="fi-eye"></i><br>VIEW', ['class' => 'button medium primary', 'type' => 'button', 'onclick' => 'return view()']) }}
                @else
                {{ Form::button('<i class="fi-eye"></i><br>VIEW', ['class' => 'disabled button medium primary', 'type' => 'button']) }}
                @endif
            </li>

            @if($logged_user->hasAccess('printResult'))
            <li>
                @if($students)
                {{ Form::button('<i class="fi-print"></i><br>PRINT', ['class' => 'button medium success', 'type' => 'button', 'onclick' => 'return prepare()']) }}
                @else
                {{ Form::button('<i class="fi-print"></i><br>PRINT', ['class' => 'disabled button medium success', 'type' => 'button']) }}
                @endif
            </li>
            @endif

            @if($logged_user->hasAccess('results.lock') && $logged_user->hasAccess('results.unlock'))
            <li>
                @if($students)
                    @if($locked)
                    {{ Form::button('<i class="fi-lock"></i><br>UNLOCK', ['class' => 'button medium alert', 'type' => 'button', 'onclick' => 'return unlock()']) }}
                    @else
                    {{ Form::button('<i class="fi-lock"></i><br>LOCK', ['class' => 'button medium secondary', 'type' => 'button', 'onclick' => 'return lock()']) }}
                    @endif
                @else
                {{ Form::button('<i class="fi-lock"></i><br>LOCK', ['class' => 'disabled button medium secondary', 'type' => 'button']) }}
                @endif
            </li>
            @endif
        </ul>
        <ul class="button-group left">
            <li>
                @if($students)
                {{ Form::button('<i class="fi-eye"></i><br>CLASS OVERVIEW', ['class' => 'button medium primary', 'type' => 'button', 'onclick' => 'return classwise()']) }}
                @else
                {{ Form::button('<i class="fi-eye"></i><br>CLASS OVERVIEW', ['class' => 'disabled button medium primary', 'type' => 'button']) }}
                @endif
            </li>
        </ul>
    </div>
</div>

{{ Form::close() }}
