@extends('layout')

@section('content')
   @include('partials.crumbs', ['current' => 'Exams'])

   <div class="panel">
      <h5><i class="fi-list"></i> Exams</h5>
      <hr>

      <table class="small-12">
         <thead>
            <tr>
               <th>#</th>
               <th>Test</th>
               <th>Assessment</th>
               <th>Subject</th>
               <th>Classroom</th>
               <th>Academic Session</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach($exams as $key => $exam)
            <tr>
               <td>{{ $exams->getFrom() + $key }}</td>
               <td>{{ $exam->test->name }}</td>
               <td>{{ $exam->test->assessment->name }}</td>
               <td>{{ $exam->test->subject->name }}</td>
               <td>{{ $exam->classRoom->name }}</td>
               <td>{{ $exam->academicSession->session }}</td>
               <td class="text-right">
                  @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'exams', 'item' => $exam])
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>

      {{ $exams->links() }}
   </div>
@stop
