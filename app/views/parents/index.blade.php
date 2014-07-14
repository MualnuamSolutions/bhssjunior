@extends('layout')

@section('content')

@include( 'partials.crumbs', ['current' => 'Parent\'s Dashboard'] )

<div class="panel">
   <h5><i class="fi-dashboard"></i> Parent's Dashboard</h5>
   <hr>

    @include("parents/_form")

    @if($student)
    <div class="row">
        <div class="medium-4 small-12 columns">
            <table>
                <tbody>
                    <tr>
                        <th class="small-4 text-right">Name</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th class="small-4 text-right">Photo</th>
                        <td>{{ $student->photo ? '<img src="' . asset($student->photo->path) . '" style="height:80px" />' : null }}</td>
                    </tr>
                    <tr>
                        <th class="small-4 text-right">Reg No</th>
                        <td>{{ $student->regno }}</td>
                    </tr>
                    <tr>
                        <th class="small-4 text-right">Primary Contact</th>
                        <td>{{ $student->contact1 }}</td>
                    </tr>
                    <tr>
                        <th class="small-4 text-right">Class</th>
                        <td>{{ $student->class}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="small-12 medium-8 columns">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Test Name</th>
                        <th>Test Date</th>
                        <th>Mark</th>
                        <th>Teacher</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marks as $key => $mark)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $mark->subject_name}}</td>
                        <td>{{ $mark->test_name }}{{ $mark->name ? ' (' . $mark->name . ')' : null }}</td>
                        <td>{{ date('d F Y', strtotime($mark->exam_date)) }}</td>
                        <td>{{ $mark->mark}}</td>
                        <td>{{ $mark->teacher_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@stop
