<div class="session-detail">
    <div class="row">
        <div class="large-4 columns">
            <span><b>Academic Session:</b> {{ $session->start . ' - ' . $session->end }}</span>
        </div>
        <div class="large-8 columns">
            <span><b>Completed Assessments:</b>
            @foreach($completedAssessments as $key=>$assessment)
            {{ $key > 0 ? $assessment->short_name . ', ' : $assessment->short_name }}
            @endforeach
            </span>
        </div>
    </div>
</div>
