@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Result Configurations'] )

<div class="panel">
    <h5><i class="fi-list"></i> Result Configurations</h5>
    <hr>

    <table class="small-12">
        <thead>
            <tr>
                <th>#</th>
                <th>Academic Session</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($resultConfigurations as $key => $resultConfiguration)
        <tr>
            <td>{{ $resultConfigurations->getFrom() + $key }}</td>
            <td>{{ $resultConfiguration->start . '-' . $resultConfiguration->end }}</td>
            <td>{{ date('d/m/Y h:iA', strtotime($resultConfiguration->created_at)) }}</td>
            <td>{{ date('d/m/Y h:iA', strtotime($resultConfiguration->updated_at)) }}</td>
            <td class="text-right">
                @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'result-configuration', 'item' => $resultConfiguration])
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $resultConfigurations->appends(Input::all())->links() }}
</div>
@stop
