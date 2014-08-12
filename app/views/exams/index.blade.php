@extends('layout')

@section('content')
@include('partials.crumbs', ['current' => 'Test Records'])

<div class="panel">
    <h5><i class="fi-list"></i> Test Records</h5>
    <hr>

    @include( 'exams.toolbar' )

    <table class="small-12">
        <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Test</th>
            <th>Class</th>
            <th>Exam Date</th>
            <th>Assessment</th>

            @if($logged_user->inGroup($adminGroup) || $logged_user->isSuperUser())
            <th>Teacher</th>
            @endif

            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($exams as $key => $exam)
        <tr>
            <td>{{ $exams->getFrom() + $key }}</td>
            <td>{{ $exam->subject }}</td>
            <td>
                <small><b>{{ strtoupper($exam->testName) }}</b></small>
                {{ $exam->name ? '<br>' . $exam->name : null }}
            </td>
            <td>{{ preg_replace('/Class/', '', $exam->classRoom) }}</td>
            <td>{{ date('j/m/Y', strtotime($exam->exam_date)) }}</td>
            <td>{{ $exam->assessment }}</td>

            @if($logged_user->inGroup($adminGroup) || $logged_user->isSuperUser())
            <td>{{ $exam->teacherName }}</td>
            @endif

            <td class="text-right">
                <a target="_blank" class="view button tiny success" href="{{ route('exams.print', $exam->id) }}">
                   <i class="fi-print"></i>
                </a>
                @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'exams', 'item' => $exam])
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $exams->links() }}
</div>
@stop
