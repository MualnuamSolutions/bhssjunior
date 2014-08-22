<div class="subject-detail" id="subject_detail">
    <div class="row">
        <div class="large-3 columns">
            @foreach($classroom->subjects as $key => $subject)
                <a class="sidenav-subject button medium {{ $subject->id == $currentSubject->id ? 'success' : 'secondary' }}" href="{{ route('parents.index', ['regno' => $student->regno, 'contact1' => $student->contact1, 'subject' => $subject->id]) }}#subject_detail">
                    <span class="subject-name">{{ $subject->name }}</span>{{ $subject->id == $currentSubject->id ? '<i style="float:right;" class="fa fa-chevron-right"></i>' : '' }}
                </a>
            @endforeach
        </div>
        <div class="large-9 columns">
            @include('parents/_tests')
        </div>
    </div>
</div>