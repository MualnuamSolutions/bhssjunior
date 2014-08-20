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
    url += 'academic_session=' + $('#academic_session').val();
    url += '&assessment=' + $('#assessment').val();
    url += '&class=' + $('#class').val();
    url += '&student=' + $('#student').val();

    window.open(url);
}
</script>
@stop