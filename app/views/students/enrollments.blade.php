@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Enrollments', 'crumbs' => ['Students' => route('students.index')]] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>

    @include( 'students._submenu', ['active' => 'enrollments'])

    <div class="row">
        <div class="medium-12 columns">
            <fieldset>
                <legend>Enrollment Detail</legend>

                <table class="small-12">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="small-2">Academic Session</th>
                        <th class="small-2">Class</th>
                        <th class="small-2">Roll No</th>
                        <th class="small-2">House</th>
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
                        <td>{{ $enrollment->house }}</td>
                        <td class="text-right">
                            @if( $logged_user->hasAccess('students.removeEnrollment'))
                            {{ Form::open(['route' => ['students.removeEnrollment', $enrollment->id], 'method' => 'delete', 'class' => 'inline']) }}
                            <button type="submit" class="button tiny alert" onclick="return confirm('Are you sure you want to delete?');"><i
                                    class="fi-x"></i><span class="hide-for-small-only">&nbsp;Delete</span></button>
                            {{ Form::close() }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                @if( $logged_user->hasAccess('students.addEnrollment'))
                <hr>
                <div class="row">
                    <div class="small-12 columns text-right">
                        <a class="button small success" href="{{ route('students.addEnrollment', $student->id) }}">Add
                            Enrollment</a>
                    </div>
                </div>
                @endif

            </fieldset>
        </div>
    </div>

    {{ $enrollments->links() }}
</div>
@stop
