@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'View Student', 'crumbs' => ['Students' => route('students.index')] ] )

<div class="panel">
   	<h5><i class="fi-page-view"></i> View Student - {{ $student->name }} ({{ $student->regno }})</h5>
   	<hr>
   	<dl class="tabs" data-tab>
		<dd class="active"><a href="#profile">Profile</a></dd>
		<dd><a href="#measurements">Physical Measurement</a></dd>
		<dd><a href="#enrollments">Enrollments</a></dd>
		<dd><a href="#photos">Photos</a></dd>
	</dl>
	<div class="tabs-content">
		<div class="content active" id="profile">
			<div class="row">
				<div class="medium-6 columns">
					<table class="profile small-12">
						<tbody>
	                        <tr>
	                            <th>Registration Number</th>
	                            <td>{{ $student->regno }}</td>
	                        </tr>
							<tr>
								<th>Name</th>
								<td>{{ $student->name }}</td>
							</tr>
							<tr>
								<th>Gender</th>
								<td>{{ $student->gender }}</td>
							</tr>
	                        <tr>
	                            <th>Date of Birth</th>
	                            <td>{{ date('d M Y', strtotime($student->dob)) }}</td>
	                        </tr>
	                        <tr>
	                            <th>Father's Name</th>
	                            <td>{{ $student->father }}</td>
	                        </tr>
	                        <tr>
	                            <th>Father's Occupation</th>
	                            <td>{{ $student->fathers_occupation }}</td>
	                        </tr>
                        </tbody>
					</table>
				</div>
				<div class="medium-6 columns">
					<table class="profile">
						<tbody>
		                    <tr>
		                        <tr>
		                            <th>Mother's Name</th>
		                            <td>{{ $student->mother }}</td>
		                        </tr>
		                        <tr>
		                            <th>Mother's Occupation</th>
		                            <td>{{ $student->mothers_occupation }}</td>
		                        </tr>
		                        <tr>
		                            <th>Primary Contact</th>
		                            <td>{{ $student->contact1 }}</td>
		                        </tr>
		                        <tr>
		                            <th>Alternate Contact</th>
		                            <td>{{ $student->contact2 }}</td>
		                        </tr>
		                        <tr>
		                            <th>Address</th>
		                            <td>{{ $student->address }}</td>
		                        </tr>
		                    </tr>
	                   	</tbody>
	                </table>
				</div>
			</div>
		</div>
		<div class="content" id="measurements">
			<table class="small-12">
				<thead>
					<tr>
                        <th>#</th>
                        <th class="small-3">Academic Session</th>
                        <th class="small-3">Height</th>
                        <th class="small-3">Weight</th>
                        <th class="small-3">Entry Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($measurements as $key => $measurement)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $measurement->academicSession->session }}</td>
                        <td>{{ $measurement->height }}</td>
                        <td>{{ $measurement->weight }}</td>
                        <td>{{ date('d/m/Y h:iA', strtotime($measurement->created_at)) }}</td>
                    </tr>
                    @endforeach
				</tbody>
            </table>
		</div>
		<div class="content" id="enrollments">
			<table class="small-12">
                <thead>
	                <tr>
	                    <th>#</th>
	                    <th class="small-3">Academic Session</th>
	                    <th class="small-3">Class</th>
	                    <th class="small-3">Roll No</th>
	                    <th class="small-3">House</th>
	                </tr>
                </thead>
                <tbody>
	                @foreach($enrollments as $key => $enrollment)
	                <tr>
	                    <td>{{ ++$key }}</td>
	                    <td>{{ $enrollment->academicSession->session }}</td>
	                    <td>{{ $enrollment->classRoom->name }}</td>
	                    <td>{{ $enrollment->roll_no }}</td>
	                    <td>{{ $enrollment->house ? $enrollment->house : '-' }}</td>
	                </tr>
	                @endforeach
                </tbody>
            </table>
		</div>
		<div class="content" id="photos">
			<table class="small-12">
                <thead>
	                <tr>
	                    <th>#</th>
	                    <th class="small-5">Photo</th>
	                    <th class="small-4">Added</th>
	                    <th class="small-3">Current</th>
	                </tr>
                </thead>
                <tbody>
	                @foreach($photos as $key => $photo)
	                <tr>
	                    <td>{{ ++$key }}</td>
	                    <td><img src="{{ asset($photo->path) }}" alt="{{ $student->name }}" class="student-photo" /></td>
	                    <td>{{ date('d F, Y h:iA', strtotime($photo->created_at)) }}</td>
	                    <td class="text-center">
	                        @if(!$photo->default)
	                        {{ Form::open(['route' => ['students.defaultPhoto', $student->id], 'method' => 'post', 'class' => 'inline']) }}
	                        <button type="submit" name="default" value="{{ $photo->id }}" class="button tiny success"><i
	                                class="fi-check"></i><span class="hide-for-small-only">&nbsp;Set Default</span></button>
	                        {{ Form::close() }}
	                        @else
	                        <h3><i class="fi-check"></i></h3>
	                        @endif
	                    </td>
	                </tr>
	                @endforeach
                </tbody>
            </table>
		</div>
	</div>
</div>
@stop
