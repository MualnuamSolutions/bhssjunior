<section class="top-bar-section">
    <ul class="right">

        @if(Sentry::check())

        @if ( $logged_user->hasAnyAccess(['classrooms.index', 'subjects.index', 'students.index']) )
        <li class="divider"></li>
        <li class="has-dropdown">
            <a href="{{ $logged_user->hasAccess('classrooms.index') ? route('classrooms.index') : '#' }}">Class</a>
            <ul class="dropdown">
                @if ( $logged_user->hasAccess('classrooms.index') )
                <li><a href="{{ route('classrooms.index') }}">Class Rooms</a></li>
                @endif

                @if ( $logged_user->hasAccess('classrooms.create') )
                <li><a href="{{ route('classrooms.create') }}">Create New Class</a></li>
                @endif

                @if ( $logged_user->hasAccess('subjects.create') || $logged_user->hasAccess('subjects.index') )
                <li><label>Subject</label></li>
                @if ( $logged_user->hasAccess('subjects.index'))
                <li><a href="{{ route('subjects.index') }}">View Subjects</a></li>
                @endif
                @if ( $logged_user->hasAccess('subjects.create'))
                <li><a href="{{ route('subjects.create') }}">Create Subject</a></li>
                @endif
                @endif

                @if ( $logged_user->hasAccess('students.create') || $logged_user->hasAccess('students.index') )
                <li><label>Student</label></li>
                @if ( $logged_user->hasAccess('idcards.index'))
                <li><a href="{{ route('idcards.index') }}">Identity Cards</a></li>
                @endif
                @if ( $logged_user->hasAccess('students.index'))
                <li><a href="{{ route('students.index') }}">View Students</a></li>
                @endif
                @if ( $logged_user->hasAccess('students.create'))
                <li><a href="{{ route('students.create') }}">Create New Student</a></li>
                @endif
                @endif
            </ul>
        </li>
        @endif

        @if ( $logged_user->hasAnyAccess(['exams.index', 'marks.create', 'assessments.index', 'tests.index']) )
        <li class="divider"></li>
        <li class="has-dropdown">
            <a href="{{ $logged_user->hasAccess('exams.index') ? route('exams.index') : '#' }}">Examination</a>
            <ul class="dropdown">
                <li><label>Results</label></li>
                @if ( $logged_user->hasAccess('marks.create') )
                <li><a href="{{ route('marks.create') }}">Marks Entry</a></li>
                @endif

                @if ( $logged_user->hasAccess('exams.index') )
                <li><a href="{{ route('exams.index') }}">Test Records</a></li>
                @endif

                @if ( $logged_user->hasAccess('results.index') )
                <li><a href="{{ route('results.index') }}">Prepare Results</a></li>
                @endif

                @if ( $logged_user->hasAccess('result-configuration.create') )
                <li><a href="{{ route('result-configuration.create') }}">Create Result Configuration</a></li>
                @endif

                @if ( $logged_user->hasAccess('result-configuration.index') )
                <li><a href="{{ route('result-configuration.index') }}">Result Configurations</a></li>
                @endif

                @if ( $logged_user->hasAccess('assessments.create') && $logged_user->hasAccess('assessments.index') )
                <li><label>Assessment Scheme</label></li>
                <li><a href="{{ route('assessments.index') }}">View Schemes</a></li>
                <li><a href="{{ route('assessments.create') }}">Create Scheme</a></li>
                @endif

                @if ( $logged_user->hasAccess('tests.create') && $logged_user->hasAccess('tests.index') )
                <li><label>Tests</label></li>
                <li><a href="{{ route('tests.index') }}">View Tests</a></li>
                <li><a href="{{ route('tests.create') }}">Create Test</a></li>
                @endif

            </ul>
        </li>
        @endif

        @if ( $logged_user->hasAccess('academicsessions.create') && $logged_user->hasAccess('academicsessions.index') )
        <li class="divider"></li>
        <li class="has-dropdown">
            <a href="{{ route('academicsessions.index') }}">Session</a>
            <ul class="dropdown">
                <li><a href="{{ route('academicsessions.create') }}">Create Academic Session</a></li>
            </ul>
        </li>
        @endif

        @if ( $logged_user->hasAccess('users.create') && $logged_user->hasAccess('users.index') )
        <li class="divider"></li>
        <li><a href="{{ route('users.index') }}"><i class="fi-torsos-all"></i></a></li>
        @endif

        @if ( $logged_user->hasAccess('users.profile') && $logged_user->hasAccess('users.profile') )
        <li class="divider"></li>
        <li><a href="{{ route('users.profile') }}"><i class="fi-pencil"></i></a></li>
        @endif

        @if ( $logged_user->hasAccess('settings.index') )
        <li class="divider"></li>
        <li><a href="{{ route('settings.index') }}"><i class="fi-wrench"></i></a></li>
        @endif

        <li class="alert"><a href="{{ route('logout') }}" title="Log Out"><i class="fi-power"></i></a></li>

        @else
        <li><a href="{{ route('parents.index') }}">Parent's Dashboard</a></li>
        @endif
    </ul>
</section>

