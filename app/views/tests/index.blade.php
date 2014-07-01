@extends('layout')

@section('content')
@include('partials.crumbs', ['current' => 'Tests'])

<div class="panel">
   <h5><i class="fi-list"></i> Tests</h5>
   <hr>

   <table class="small-12">
      <thead>
      <tr>
         <th>#</th>
         <th>Name</th>
         <th>Subject</th>
         <th>Assessment</th>
         <th>Total Marks</th>
         <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach($tests as $key => $test)
      <tr>
         <td>{{ $tests->getFrom() + $key }}</td>
         <td>{{ $test->name }}</td>
         <td>{{ $test->subject->name }}</td>
         <td>{{ $test->assessment->name }}</td>
         <td>{{ $test->totalmarks }}</td>
         <td class="text-right">
            @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'tests', 'item' => $test])
         </td>
      </tr>
      @endforeach
      </tbody>
   </table>

   {{ $tests->links() }}
</div>
@stop
