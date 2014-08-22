<div class="test-subjects">
    <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
        @foreach($classroom->subjects as $key => $subject)
        <li>
            <a class="test-subject large secondary" href="{{ route('parents.index', ['regno' => $student->regno, 'contact1' => $student->contact1, 'subject' => $subject->id]) }}">
                <span class="subject-name">{{ $subject->name }}</span>
                <span class="no-of-test"><i class="fi-check"></i><b>{{ Exam::getTests($subject->id, $student->currentClass->id)->count() }}</b> Tests</span>
                <span class="teacher-name">
                <?php $teachers = Exam::getSubjectTeachers($subject->id, $student->currentClass->id); ?>
                    @foreach($teachers as $teacher)
                    <b><i class="fi-torso"></i> {{ $teacher->name }}</b>
                    @endforeach
                </span>
            </a>
        </li>
        @endforeach
    </ul>
</div>