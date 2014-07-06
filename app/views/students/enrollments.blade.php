@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Enrollments', 'crumbs' => ['Students' => route('students.index')]] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>
    <ul class="button-group">
        <li><a href="{{ route('students.edit', $student->id) }}" class="button secondary">Profile</a></li>
        <li><a href="{{ route('students.enrollments', $student->id) }}" class="button">Enrollments</a></li>
        <li><a href="{{ route('students.photos', $student->id) }}" class="button secondary">Photos</a></li>
    </ul>

    <div class="row">
        <div class="medium-12 columns">
            <fieldset>
                <legend>Enrollment Detail</legend>

                <table class="small-12">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="small-4">Academic Session</th>
                        <th class="small-2">Class</th>
                        <th class="small-2">Roll No</th>
                        <th class="small-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($enrollments as $key => $enrollment)
                    <tr>
                        <td>{{ $enrollments->getFrom() + $key }}</td>
                        <td>{{ $enrollment->academicSession->session }}</td>
                        <td>{{ $enrollment->classRoom->name }}</td>
                        <td>{{ $enrollment->roll_no }}</td>
                        <td class="text-right">
                            {{ Form::open(['route' => ['students.removeEnrollment', $enrollment->id], 'method' => 'delete', 'class' => 'inline']) }}
                            <button type="submit" class="button tiny alert" onclick="return confirm('Are you sure you want to delete?');"><i
                                    class="fi-x"></i><span class="hide-for-small-only">&nbsp;Delete</span></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <hr>
                <div class="row">
                    <div class="small-12 columns text-right">
                        <a class="button small success" href="{{ route('students.addEnrollment', $student->id) }}">Add
                            Enrollment</a>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>

    {{ $enrollments->links() }}
</div>
@stop
