@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-list"></i> Students</h5>
      <hr>

      <table class="small-12">
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Age</th>
               <th>Father</th>
               <th>Contact</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach($students as $key => $student)
            <tr>
               <td>{{ $students->getFrom() + $key }}</td>
               <td>{{ $student->name }}</td>
               <td>{{ $student->age }}</td>
               <td>{{ $student->father }}</td>
               <td>{{ $student->contact }}</td>
               <td class="text-right">
                  @include('partials.actions', ['actions'=> ['view', 'edit', 'delete'], 'route' => 'students', 'item' => $student])
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>

      {{ $students->links() }}
   </div>
@stop
