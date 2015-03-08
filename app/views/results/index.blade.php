@extends('layout')

@section('content')

@include( 'partials.crumbs', ['current' => 'Prepare Results'] )

<div class="panel">
    <h5><i class="fi-results"></i> Prepare Results</h5>
    <hr>

    @include('results.toolbar')
</div>
@stop

@section('scripts')
<script>
function prepare()
{
    var url = '/results/create?';
        url += 'action=print';
        url += '&academic_session=' + $('#academic_session').val();
        url += '&assessment=' + $('#assessment').val();
        url += '&class=' + $('#class').val();
        url += '&student=' + $('#student').val();

    window.open(url);
}

function view()
{
    var url = '/results/create?';
        url += 'action=view';
        url += '&academic_session=' + $('#academic_session').val();
        url += '&assessment=' + $('#assessment').val();
        url += '&class=' + $('#class').val();
        url += '&student=' + $('#student').val();

    window.open(url);
}

function classwise()
{
    var url = '/results/create?';
        url += 'action=classwise';
        url += '&academic_session=' + $('#academic_session').val();
        url += '&assessment=' + $('#assessment').val();
        url += '&class=' + $('#class').val();
        url += '&student=0';

    window.open(url);
}

function overall()
{
    var url = '/results/create?';
        url += 'action=overall';
        url += '&academic_session=' + $('#academic_session').val();
        url += '&assessment=' + $('#assessment').val();
        url += '&class=' + $('#class').val();
        url += '&student=' + $('#student').val();

    window.open(url);
}

function profile()
{
    var url = '/results/create?';
        url += 'action=profile';
        url += '&academic_session=' + $('#academic_session').val();
        url += '&assessment=' + $('#assessment').val();
        url += '&class=' + $('#class').val();
        url += '&student=' + $('#student').val();

    window.open(url);
}

function lock()
{
    var url = '/results/lock?';
        url += '&academic_session=' + $('#academic_session').val();
        url += '&assessment=' + $('#assessment').val();
        url += '&class=' + $('#class').val();

    window.location.href = url;
}

function unlock()
{
    var url = '/results/unlock?';
        url += '&academic_session=' + $('#academic_session').val();
        url += '&assessment=' + $('#assessment').val();
        url += '&class=' + $('#class').val();

    window.location.href = url;
}

</script>
@stop