<ul class="button-group">
    <li><a href="{{ route('students.edit', $student->id) }}" class="button {{ $active != 'profile' ? 'secondary' : '' }}">Profile</a></li>
    <li><a href="{{ route('students.measurements', $student->id) }}" class="button {{ $active != 'measurements' ? 'secondary' : '' }}">Physical Measurement</a></li>
    <li><a href="{{ route('students.enrollments', $student->id) }}" class="button {{ $active != 'enrollments' ? 'secondary' : '' }}">Enrollments</a></li>
    <li><a href="{{ route('students.photos', $student->id) }}" class="button {{ $active != 'photos' ? 'secondary' : '' }}">Photos</a></li>
</ul>
