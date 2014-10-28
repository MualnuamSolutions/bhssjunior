@extends('layout')

@section('content')

@include( 'partials.crumbs', ['current' => 'ID Cards'] )

<div class="panel">
    <h5><i class="fi-results"></i> Identity Cards</h5>
    <hr>


	{{ Form::open(['route' => 'idcards.index', 'method' => 'get', 'class' => 'toolbar']) }}
	<div class="row">
	    <div class="medium-2 columns">
	        {{ Form::select('academic_session', $academicSessions, Input::get('academic_session'), ['id' => 'academic_session']) }}
	    </div>
	    <div class="medium-3 columns">
	        {{ Form::select('class', $classes, Input::get('class'), ['id' => 'class']) }}
	    </div>
	    <div class="medium-4 columns">
	        @if($students)
	            {{ Form::select('student', array('0' => 'All Students') + $students, Input::get('student'), ['id' => 'student']) }}
	        @endif
	    </div>
	    <div class="medium-3 columns">
	        <ul class="button-group left">
	            <li>
	                @if($students)
	                {{ Form::button('<i class="fi-eye"></i><br>VIEW', ['class' => 'button medium primary', 'type' => 'button', 'onclick' => 'return view()']) }}
	                @else
	                {{ Form::button('<i class="fi-eye"></i><br>VIEW', ['class' => 'disabled button medium primary', 'type' => 'button']) }}
	                @endif
	            </li>
	        	@if($logged_user->hasAccess('idcards.print'))
	            <li>
	                @if($students)
	                {{ Form::button('<i class="fi-print"></i><br>PRINT', ['class' => 'button medium success', 'type' => 'button', 'onclick' => 'return print()']) }}
	                @else
	                {{ Form::button('<i class="fi-print"></i><br>PRINT', ['class' => 'disabled button medium success', 'type' => 'button']) }}
	                @endif
	            </li>
	            @endif
	        </ul>
	    </div>

	</div>

	{{ Form::close() }}
</div>
@stop

@section('scripts')
<script>
function view()
{
    var url = '/idcards/create?';
    url += 'action=view';
    url += '&academic_session=' + $('#academic_session').val();
    url += '&class=' + $('#class').val();
    url += '&student=' + $('#student').val();

    window.open(url);
}

function print()
{
    var url = '/idcards/create?';
    url += 'action=print';
    url += '&academic_session=' + $('#academic_session').val();
    url += '&class=' + $('#class').val();
    url += '&student=' + $('#student').val();

    window.open(url);
}
</script>
@stop