@extends('print')

@section('content')
<div class="test-result">
    <table class="logo-head">
        <tr>
            <td colspan="2" align="center">
                <img src="{{ asset('images/logo.jpg') }}" alt=""/>
                <h3>BAPTIST HIGHER SECONDARY SCHOOL JUNIOR SECTION</h3>
                <h1>TEST REPORT</h1>
            </td>
        </tr>
        <tr>
            <td><hr/></td>
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

    <div class="row">
        <div class="col2 fl">
            <div class="data-head">
                <table>
                    <thead>
                        <tr>
                          <th width="20%">R.No</th>
                          <th width="60%">Name</th>
                          <th width="20%">Mark</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="col2 fr">
            <div class="data-head">
                <table>
                    <thead>
                        <tr>
                          <th width="20%">R.No</th>
                          <th width="60%">Name</th>
                          <th width="20%">Mark</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col2 fl">
            @foreach ($exam->marks as $key => $mark)
                <div class="data-row">
                    <table>
                        <tbody>
                            <tr class="{{ ($key+1)%2 == 0 ? 'even' : null }}">
                                <td width="20%">{{ $mark->student->rollNo }}</td>
                                <td width="60%">{{ $mark->student->name }}</td>
                                <td width="20%">{{ $mark->mark }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            @if( floor($exam->marks->count() / 2) == ($key+1) )
            </div><div class="col2 fr">
            @endif

            @endforeach
        </div>
    </div>

    <div class="signature">
        <p>({{ strtoupper($exam->teacher) }})</p>
    </div>
</div>
@stop