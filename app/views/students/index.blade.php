@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Students'] )

<div class="panel">
   <h5><i class="fi-list"></i> Students</h5>
   <hr>

   <table class="small-12">
      <thead>
      <tr>
         <th>#</th>
         <th class="hide-for-small-only">Reg. No</th>
         <th>Name</th>
         <th class="hide-for-small-only">Class</th>
         <th class="hide-for-small-only">Father</th>
         <th class="hide-for-small-only">Contact</th>
         <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach($students as $key => $student)
      <tr>
         <td>{{ $students->getFrom() + $key }}</td>
         <td class="hide-for-small-only">{{ $student->regno }}</td>
         <td>
            {{ $student->name }}
            <div>
               <small class="show-for-small-only">{{ $student->father }}</small>
            </div>
            <div>
               <small class="show-for-small-only">{{ $student->dob }}</small>
            </div>
            <div>
               <small class="show-for-small-only">{{ $student->contact1 }}</small>
            </div>
         </td>
         <td class="hide-for-small-only">{{ $student->class }}</td>
         <td class="hide-for-small-only">{{ $student->father }}</td>
         <td class="hide-for-small-only">{{ $student->contact1 }}</td>
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
