{{ Form::open(['route' => 'results.index', 'method' => 'get', 'class' => 'toolbar']) }}
<div class="row">
    <div class="medium-6 columns">
        <div class="row">
            <div class="medium-4 columns">
                {{ Form::select('academic_session', $academicSessions, Input::get('academic_session', AcademicSession::currentSession()->id), ['id' => 'academic_session']) }}
            </div>
            <div class="medium-4 columns">
                {{ Form::select('assessment', $assessments, Input::get('assessment'), ['id' => 'assessment']) }}
            </div>
            <div class="medium-4 columns">
                {{ Form::select('class', $classes, Input::get('class'), ['id' => 'class']) }}
            </div>
            <div class="medium-12 columns">
                @if($students)
                    <button type="button" class="button tiny" id="select_all">Select All</button>
                    {{ Form::select('student[]', $students, Input::get('student'), ['id' => 'student', 'class'=>'select-all', 'multiple'=>true, 'style'=>'background:none;height:' . (sizeof($students) * 6) . 'px']) }}
                @endif
            </div>
        </div>
    </div>
    <div class="medium-6 columns">
        <div class="row">
            <div class="medium-12 columns">
                <ul class="button-group left">
                    <li>
                        @if($students)
                        {{ Form::button('<i class="fi-eye"></i><br>VIEW', ['class' => 'button small primary', 'type' => 'button', 'onclick' => 'return view()']) }}
                        @else
                        {{ Form::button('<i class="fi-eye"></i><br>VIEW', ['class' => 'disabled button small primary', 'type' => 'button']) }}
                        @endif
                    </li>

                    @if($logged_user->hasAccess('printResult'))
                    <li>
                        @if($students)
                        {{ Form::button('<i class="fi-print"></i><br>PRINT', ['class' => 'button small success', 'type' => 'button', 'onclick' => 'return prepare()']) }}
                        @else
                        {{ Form::button('<i class="fi-print"></i><br>PRINT', ['class' => 'disabled button small success', 'type' => 'button']) }}
                        @endif
                    </li>
                    @endif

                    @if($logged_user->hasAccess('results.lock') && $logged_user->hasAccess('results.unlock'))
                    <li>
                        @if($students)
                            @if($locked)
                            {{ Form::button('<i class="fi-lock"></i><br>UNLOCK', ['class' => 'button small alert', 'type' => 'button', 'onclick' => 'return unlock()']) }}
                            @else
                            {{ Form::button('<i class="fi-lock"></i><br>LOCK', ['class' => 'button small secondary', 'type' => 'button', 'onclick' => 'return lock()']) }}
                            @endif
                        @else
                        {{ Form::button('<i class="fi-lock"></i><br>LOCK', ['class' => 'disabled button small secondary', 'type' => 'button']) }}
                        @endif
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="medium-12 columns">
                <ul class="button-group left">
                    <li>
                        @if($students)
                        {{ Form::button('<i class="fi-eye"></i><br>CLASS OVERVIEW', ['class' => 'button small primary', 'type' => 'button', 'onclick' => 'return classwise()']) }}
                        @else
                        {{ Form::button('<i class="fi-eye"></i><br>CLASS OVERVIEW', ['class' => 'disabled button small primary', 'type' => 'button']) }}
                        @endif
                    </li>
                    <li>
                        @if($students)
                        {{ Form::button('<i class="fi-eye"></i><br>OVERALL RESULT', ['class' => 'button small primary', 'type' => 'button', 'onclick' => 'return overall()']) }}
                        @else
                        {{ Form::button('<i class="fi-eye"></i><br>OVERALL RESULT', ['class' => 'disabled button small primary', 'type' => 'button']) }}
                        @endif
                    </li>
                    <li>
                        @if($students)
                        {{ Form::button('<i class="fi-eye"></i><br>PERSONAL PROFILE', ['class' => 'button small primary', 'type' => 'button', 'onclick' => 'return profile()']) }}
                        @else
                        {{ Form::button('<i class="fi-eye"></i><br>PERSONAL PROFILE', ['class' => 'disabled button small primary', 'type' => 'button']) }}
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="medium-3 columns">
    </div>
    <div class="medium-2 columns">
    </div>
    <div class="medium-3 columns">
    </div>
    <div class="medium-4 columns">
        
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        
        
    </div>
</div>

{{ Form::close() }}
