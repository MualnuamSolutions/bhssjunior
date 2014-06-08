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
            <li><a href="#">Assessments</a></li>
            <li><a href="#">Results</a></li>
            <li><a href="#">Test</a></li>
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
      <li><a href="{{ route('user.index') }}"><i class="fi-torsos-all"></i></a></li>
      <li class="divider"></li>
      <li><a href="#"><i class="fi-wrench"></i></a></li>
      <li class="alert"><a href="{{ route('logout') }}" title="Log Out"><i class="fi-power"></i></a></li>
   </ul>
</section>
@endif
