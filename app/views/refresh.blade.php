@extends('layout')

@section('content')
<div class="alert-box success">Permissions Refreshed</div>

<div class="row">
	<div class="small-4 columns">
		<table class="small-12">
			<thead>
				<tr>
					<th colspan="2">Admin</th>
				</tr>
			</thead>
			<tbody>
				@foreach($permissions['Admin'] as $resource => $permission)
				<tr>
					<td>{{ $resource }}</td>
					<td>{{ $permission }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="small-4 columns">
		<table class="small-12">
			<thead>
				<tr>
					<th colspan="2">Staff</th>
				</tr>
			</thead>
			<tbody>
				@foreach($permissions['Staff'] as $resource => $permission)
				<tr>
					<td>{{ $resource }}</td>
					<td>{{ $permission }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="small-4 columns">
		<table class="small-12">
			<thead>
				<tr>
					<th colspan="2">External</th>
				</tr>
			</thead>
			<tbody>
				@foreach($permissions['External'] as $resource => $permission)
				<tr>
					<td>{{ $resource }}</td>
					<td>{{ $permission }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop
