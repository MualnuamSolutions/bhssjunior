@extends('layout')

@section('content')
@include('partials.crumbs', ['current' => 'Assessment Schemes'])

<div class="panel">
   <h5><i class="fi-list"></i> Assessment Schemes</h5>
   <hr>

   <table class="small-12">
      <thead>
      <tr>
         <th>#</th>
         <th>Name</th>
         <th>Term</th>
         <th>Weightage</th>
         <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach($assessments as $key => $assessment)
      <tr>
         <td>{{ $assessments->getFrom() + $key }}</td>
         <td>{{ $assessment->name }}</td>
         <td>{{ $assessment->termName }}</td>
         <td>{{ $assessment->displayWeightage }}</td>
         <td class="text-right">
            @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'assessments', 'item' => $assessment])
         </td>
      </tr>
      @endforeach
      </tbody>
   </table>

   {{ $assessments->links() }}
</div>
@stop
