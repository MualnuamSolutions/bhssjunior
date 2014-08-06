@extends('layout')

@section('content')
@include('partials.crumbs', ['current' => 'Test Records'])

<div class="panel">
    <h5><i class="fi-list"></i> Test Records</h5>
    <hr>

    <table class="small-12">
        <thead>
        <tr>
            <th>#</th>
            <th>Test</th>
            <th>Exam Date</th>
            <th>Assessment</th>
            <th>Subject</th>
            <th>Class</th>

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
            <td>
                {{ $exam->name }}<br>
                <small>{{ $exam->test ? $exam->test->name : null}}</small>
            </td>
            <td>{{ date('j/m/Y', strtotime($exam->exam_date)) }}</td>
            <td>{{ $exam->test && $exam->test->assessment ? $exam->test->assessment->short_name : null }}</td>
            <td>{{ $exam->test && $exam->test->subject ? $exam->test->subject->name : null }}</td>
            <td>{{ $exam->classRoom ? $exam->classRoom->name : null}}</td>

            @if($logged_user->inGroup($adminGroup) || $logged_user->isSuperUser())
            <td>{{ $exam->user->name }}</td>
            @endif

            <td class="text-right">
                @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'exams', 'item' => $exam])
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $exams->links() }}
</div>
@stop
