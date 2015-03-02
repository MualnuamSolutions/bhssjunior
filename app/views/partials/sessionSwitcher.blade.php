<?php 
$academicSessions = AcademicSession::getDropdownList();
$currentAcademicSession = AcademicSession::currentSession();
?>
{{ Form::open(['url' => 'switcher', 'method' => 'post', 'class' => 'toolbar']) }}
    {{ Form::select('session', $academicSessions, $currentAcademicSession->id) }}
    {{ Form::hidden('redirect_url', $_SERVER['REQUEST_URI']) }}
{{ Form::close() }}
