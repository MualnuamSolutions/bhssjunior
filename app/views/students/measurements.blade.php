@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Measurements', 'crumbs' => ['Students' => route('students.index')]] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>

    @include( 'students._submenu', ['active' => 'measurements'])

    <div class="row">
        <div class="medium-12 columns">
            <fieldset>
                <legend>Measurements</legend>

                <table class="small-12">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="small-3">Academic Session</th>
                        <th class="small-2">Height</th>
                        <th class="small-2">Weight</th>
                        <th class="small-2">Entry Date</th>
                        <th class="small-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($measurements as $key => $measurement)
                    <tr>
                        <td>{{ $measurements->getFrom() + $key }}</td>
                        <td>{{ $measurement->academicSession->session }}</td>
                        <td>{{ $measurement->height }}</td>
                        <td>{{ $measurement->weight }}</td>
                        <td>{{ date('d/m/Y h:iA', strtotime($measurement->created_at)) }}</td>
                        <td class="text-right">
                            {{ Form::open(['route' => ['students.removeMeasurement', $measurement->id], 'method' => 'delete', 'class' => 'inline']) }}
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
                        <a class="button small success" href="{{ route('students.addMeasurement', $student->id) }}">Add
                            Measurement</a>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>

    {{ $measurements->links() }}
</div>
@stop
