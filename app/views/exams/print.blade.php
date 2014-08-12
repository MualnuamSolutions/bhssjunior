@extends('print')

@section('content')
<div class="test-result">
    <table class="logo-head">
        <tr>
            <td colspan="2" align="center">
                <img src="{{ asset('images/logo.jpg') }}" alt=""/>
                <h3>BAPTIST HIGHER SECONDARY SCHOOL JUNIOR SECTION</h3>
                <hr/>
                <h1>TEST REPORT</h1>
                <hr/>
            </td>
        </tr>
    </table>

    <table class="header">
        <tr>
            <td width="60%"><b>Academic Session</b>: {{ $exam->start . ' - ' . $exam->end }}</td>
            <td width="45%"><b>Class</b>: {{ $exam->classRoom }}</td>
        </tr>
        <tr>
            <td><b>Assessment</b>: {{ $exam->assessmentName }}</td>
            <td><b>Subject</b>: {{ $exam->subjectName }}</td>
        </tr>
        <tr>
            <td><b>Test Date</b>: {{ $exam->exam_date }}</td>
            <td><b>Teacher</b>: {{ $exam->teacher }}</td>
        </tr>
        <tr>
            <td><b>Test</b>: {{ $exam->testName }}{{ $exam->name ? ' - ' . $exam->name : null }}</td>
            <td><b>Full Mark</b>: {{ $exam->totalmarks }}</td>
        </tr>
    </table>

    <div class="data-head">
        <table>
            <thead>
                <tr>
                  <th width="10%">R.No</th>
                  <th width="40%">Name</th>
                  <th width="10%">Mark</th>
                  <th width="40%">Remarks</th>
                </tr>
            </thead>
        </table>
    </div>

    @foreach ($exam->marks as $key => $mark)
    <div class="data-row">
        <table>
            <tbody>
                <tr class="{{ ($key+1)%2 == 0 ? 'even' : null }}">
                    <td width="10%">{{ $mark->student->rollNo }}</td>
                    <td width="40%">{{ $mark->student->name }}</td>
                    <td width="10%">{{ $mark->mark }}</td>
                    <td width="40%">{{ $mark->remarks }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach

</div>
@stop