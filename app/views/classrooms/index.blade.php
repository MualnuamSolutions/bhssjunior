@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-list"></i> Class Rooms</h5>
      <hr>

      <table class="small-12">
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Subjects</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach($classrooms as $key => $classroom)
            <tr>
               <td>{{ $classrooms->getFrom() + $key }}</td>
               <td>{{ $classroom->name }}</td>
               <td>{{ implode(', ', $classroom->subjects->lists('name')) }}</td>
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
