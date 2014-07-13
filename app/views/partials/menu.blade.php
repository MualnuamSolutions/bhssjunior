@if(Sentry::check())
<section class="top-bar-section">
   <ul class="right">

      @if ( $logged_user->hasAnyAccess(['classrooms.index', 'subjects.index', 'students.index']) )
      <li class="divider"></li>
      <li class="has-dropdown">
         <a href="{{ route('classrooms.index') }}">Class</a>
         <ul class="dropdown">
            @if ( $logged_user->hasAccess('classrooms.create') && $logged_user->hasAccess('classrooms.index') )
            <li><a href="{{ route('classrooms.create') }}">Create New Class</a></li>
            @endif

            @if ( $logged_user->hasAccess('subjects.create') && $logged_user->hasAccess('subjects.index') )
            <li><label>Subject</label></li>
            <li><a href="{{ route('subjects.index') }}">View Subjects</a></li>
            <li><a href="{{ route('subjects.create') }}">Create Subject</a></li>
            @endif

            @if ( $logged_user->hasAccess('students.create') && $logged_user->hasAccess('students.index') )
            <li><label>Student</label></li>
            <li><a href="{{ route('students.index') }}">View Students</a></li>
            <li><a href="{{ route('students.create') }}">Create New Student</a></li>
            @endif
         </ul>
      </li>
      @endif

      @if ( $logged_user->hasAnyAccess(['exams.index', 'marks.create', 'assessments.index', 'tests.index']) )
      <li class="divider"></li>
      <li class="has-dropdown">
         <a href="{{ route('home') }}">Examination</a>
         <ul class="dropdown">
            <li><label>Results</label></li>
            @if ( $logged_user->hasAccess('marks.create') )
            <li><a href="{{ route('marks.create') }}">Marks Entry</a></li>
            @endif

            @if ( $logged_user->hasAccess('exams.index') )
            <li><a href="{{ route('exams.index') }}">Test Records</a></li>
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

      <li class="divider"></li>
      <li><a href="#"><i class="fi-wrench"></i></a></li>

      <li class="alert"><a href="{{ route('logout') }}" title="Log Out"><i class="fi-power"></i></a></li>
   </ul>
</section>
@endif
