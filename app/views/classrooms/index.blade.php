@extends('layout')

@section('content')

@include('partials.crumbs', ['current' => 'Class Rooms'])

<div class="panel">
   <h5><i class="fi-list"></i> Class Rooms</h5>
   <hr>

   <table class="small-12">
      <thead>
      <tr>
         <th>#</th>
         <th class="small-2 medium-3">Class</th>
         <th class="small-1 medium-2">Class Teachers</th>
         <th class="small-1 medium-2">Subjects</th>
         <th class="small-1 medium-2">Enrollment</th>
         <th class="small-5 medium-3"></th>
      </tr>
      </thead>
      <tbody>
      @foreach($classrooms as $key => $classroom)
      <tr>
         <td>{{ $classrooms->getFrom() + $key }}</td>
         <td>{{ $classroom->name }}</td>
         <td>
            {{ $classroom->classTeacher1 ? $classroom->classTeacher1->name : '-' }}<br>
            {{ $classroom->classTeacher2 ? $classroom->classTeacher2->name : '-' }}
         </td>
         <td>{{ sizeof($classroom->subjects->lists('name')) }}</td>
         <td>{{ $classroom->enrollments->count() }}</td>
         <td class="text-right">
            @include('partials.actions', ['actions'=> ['view', 'edit', 'delete'], 'route' => 'classrooms', 'item' => $classroom])
         </td>
      </tr>
      @endforeach
      </tbody>
   </table>

   {{ $classrooms->links() }}
</div>
@stop
