@extends('layout')

@section('content')
   <div class="panel">
      <h5><i class="fi-list"></i> Academic Sessions</h5>
      <hr>

      <table class="small-12">
         <thead>
            <tr>
               <th>#</th>
               <th>Start</th>
               <th>End</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach($academicsessions as $key => $academicsession)
            <tr>
               <td>{{ $academicsessions->getFrom() + $key }}</td>
               <td>{{ $academicsession->start }}</td>
               <td>{{ $academicsession->session }}</td>
               <td class="text-right">
                  @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'academicsessions', 'item' => $academicsession])
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>

      {{ $academicsessions->links() }}
   </div>
@stop
