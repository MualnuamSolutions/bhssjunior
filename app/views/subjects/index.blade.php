@extends('layout')

@section('content')
<div class="panel">
   <h5><i class="fi-list"></i> Subjects</h5>
   <hr>

   <table class="small-12">
      <thead>
      <tr>
         <th>#</th>
         <th class="medium-6">Name</th>
         <th class="medium-3">Type</th>
         <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach($subjects as $key => $subject)
      <tr>
         <td>{{ $subjects->getFrom() + $key }}</td>
         <td>{{ $subject->name }}</td>
         <td>{{ $subject->type }}</td>
         <td class="text-right">
            @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'subjects', 'item' => $subject])
         </td>
      </tr>
      @endforeach
      </tbody>
   </table>

   {{ $subjects->links() }}
</div>
@stop
