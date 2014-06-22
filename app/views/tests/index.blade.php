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
               <th>Class</th>
               <th>Subject</th>
               <th>Assessment</th>
               <th>Weightage</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach($tests as $key => $test)
            <tr>
               <td>{{ $tests->getFrom() + $key }}</td>
               <td>{{ $test->name }}</td>
               <td>{{ $test->class_room_id }}</td>
               <td>{{ $test->subject_id }}</td>
               <td>{{ $test->assessment_id }}</td>
               <td>{{ $test->displayWeightage }}</td>
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