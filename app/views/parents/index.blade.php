@extends('layout')

@section('content')

@if($notfound)
<div class="row">
    <div class="large-12 columns">
        <div data-alert class="alert-box alert">Student not found. Please try again with correct detail.<a href="#" class="close">&times;</a></div>
    </div>
</div>
@endif

@include( 'partials.crumbs', ['current' => 'Parent\'s Dashboard'] )

<div class="panel">
   <h5><i class="fi-dashboard"></i> Parent's Dashboard</h5>
   <hr>

    @include("parents/_form")

    @if($student)
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-12 medium"></div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="-2">Photo</th>
                        <th class="-2">Name</th>
                        <th class="-2">Registration No</th>
                        <th class="-2">Primary Contact</th>
                        <th class="-2">Class</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $student->photo ? '<img src="' . asset($student->photo->path) . '" style="width:80px;height:80px;" />' : null }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->regno }}</td>
                        <td>{{ $student->contact1 }}</td>
                        <td>{{ $student->class}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="small-12 columns">
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
