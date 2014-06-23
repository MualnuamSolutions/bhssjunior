@if(Sentry::check())
<section class="top-bar-section">
   <ul class="right">
      <li class="divider"></li>
      <li class="has-dropdown">
         <a href="{{ route('classrooms.index') }}">Class</a>
         <ul class="dropdown">
            <li><a href="{{ route('classrooms.create') }}">Create New Class</a></li>
            <li><label>Subject</label></li>
            <li><a href="{{ route('subjects.index') }}">View Subjects</a></li>
            <li><a href="{{ route('subjects.create') }}">Create Subject</a></li>
            <li><label>Student</label></li>
            <li><a href="{{ route('students.index') }}">View Students</a></li>
            <li><a href="{{ route('students.create') }}">Create New Student</a></li>
         </ul>
      </li>
      <li class="divider"></li>
      <li class="has-dropdown">
         <a href="{{ route('home') }}">Examination</a>
         <ul class="dropdown">
            <li><label>Results</label></li>
            <li><a href="{{ route('marks.create') }}">Marks Entry</a></li>
            <li><a href="{{ route('exams.index') }}">Exams</a></li>
            <li><label>Assessment Scheme</label></li>
            <li><a href="{{ route('assessments.index') }}">View Schemes</a></li>
            <li><a href="{{ route('assessments.create') }}">Create Scheme</a></li>
            <li><label>Tests</label></li>
            <li><a href="{{ route('tests.index') }}">View Tests</a></li>
            <li><a href="{{ route('tests.create') }}">Create Test</a></li>
         </ul>
      </li>
      <li class="divider"></li>
      <li class="has-dropdown">
         <a href="{{ route('academicsessions.index') }}">Session</a>
         <ul class="dropdown">
            <li><a href="{{ route('academicsessions.create') }}">Create Academic Session</a></li>
         </ul>
      </li>
      <li class="divider"></li>
      <li><a href="{{ route('users.index') }}"><i class="fi-torsos-all"></i></a></li>
      <li class="divider"></li>
      <li><a href="#"><i class="fi-wrench"></i></a></li>
      <li class="alert"><a href="{{ route('logout') }}" title="Log Out"><i class="fi-power"></i></a></li>
   </ul>
</section>
@endif
