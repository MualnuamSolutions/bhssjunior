<div class="row">
{{ Form::open(['route' => 'classrooms.index', 'method' => 'get', 'class' => 'toolbar']) }}

    <div class="large-3 columns">
        {{ Form::select('academic_session', $academicSessions, Input::get('academic_session', $currentAcademicSession)) }}
    </div>

{{ Form::close() }}
</div>