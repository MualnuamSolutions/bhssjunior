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
         <th class="small-2 medium-2">Class</th>
         <th class="small-1 medium-4">Class Teachers</th>
         <th class="small-1 medium-2">Subjects</th>
         <th class="small-1 medium-2">Enrollment</th>
         <th class="small-5 medium-2"></th>
      </tr>
      </thead>
      <tbody>
      @foreach($classrooms as $key => $classroom)
      <tr>
         <td>{{ $classrooms->getFrom() + $key }}</td>
         <td>{{ $classroom->name }}</td>
         <td>
            {{ $classroom->classTeacher1 }}<br>
            <i>Assistant -</i> {{ $classroom->classTeacher2 }}
         </td>
         <td>{{ $classroom->subjectCount }}</td>
         <td>{{ $classroom->studentCount }}</td>
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
