{{ Form::open(['route' => 'results.index', 'method' => 'get', 'class' => 'toolbar']) }}
<div class="row">
    <div class="small-4 columns">
        <div class="row">
            <div class="small-12 columns">
                {{ Form::select('academic_session', $academicSessions, Input::get('academic_session'), ['id' => 'academic_session']) }}
            </div>

            <div class="small-12 columns">
                {{ Form::select('assessment', $assessments, Input::get('assessment'), ['id' => 'assessment']) }}
            </div>
        </div>
    </div>

    <div class="small-4 columns">
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

    <div class="small-2 columns">
        @if($students)
        {{ Form::button('<i class="fi-print"></i> PRINT', ['class' => 'button large success', 'type' => 'button', 'onclick' => 'return prepare()']) }}
        @else
        {{ Form::button('<i class="fi-print"></i> PRINT', ['class' => 'disabled button large success', 'type' => 'button']) }}
\        @endif
    </div>

    <div class="small-2 columns">
        @if($students)
        {{ Form::button('<i class="fi-eye"></i><br> VIEW', ['class' => 'button large primary', 'type' => 'button', 'onclick' => 'return view()']) }}
        @else
        {{ Form::button('<i class="fi-eye"></i><br> VIEW', ['class' => 'disabled button large primary', 'type' => 'button']) }}
        @endif
    </div>
</div>
{{ Form::close() }}
