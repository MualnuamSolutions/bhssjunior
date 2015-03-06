@extends('layout')

@section('content')

@include('partials.crumbs', ['current' => 'Students', 'crumbs' => ['Class Rooms' => route('classrooms.index'), $classroom->name => route('classrooms.show', $classroom->id)]])

<div class="panel">
   <h5><i class="fi-thumbnails"></i> {{ $classroom->name }} Students</h5>
   <hr>

   <div class="row">
      <div class="small-12 columns">
         <fieldset>
            <legend>Students ({{ $academicSession->start . " - " . $academicSession->end }})</legend>
            <table class="small-12">
               <thead>
               <tr>
                  <th class="small-1">R.No</th>
                  <th class="small-4">Name</th>
                  <th class="small-3">DOB</th>
                  <th class="small-2">Gender</th>
                  <th></th>
               </tr>
               </thead>
               <tbody>
               @if (0 == $enrollments->count())
               <tr>
                  <td colspan="5" class="text-center">No students</td>
               </tr>
               @endif

               @foreach($enrollments as $key => $enrollment)
               <tr>
                  <td>{{ $enrollment->roll_no }}</td>
                  <td>
                     {{ $enrollment->student->name }}
                           <span>
                              {{ $enrollment->student->gender == "Male" && ($enrollment->student->father && $enrollment->student->mother) ? 's/o' : 'd/o' }}
                              {{ $enrollment->student->father ? : $enrollment->student->mother }}
                           </span>
                  </td>
                  <td>{{ $enrollment->student->dob }}</td>
                  <td>{{ $enrollment->student->gender }}</td>
                  <td class="text-right">
                     @include('partials.actions', ['actions' => ['edit'], 'route' => 'students', 'item' => $enrollment->student])
                  </td>
               </tr>
               @endforeach
               </tbody>
            </table>

            <hr>
            <div class="row">
               <div class="small-12 columns text-right">
                  <a class="button small info" href="{{ route('classrooms.addstudents', $classroom->id) }}">Add
                     Students</a>
               </div>
            </div>
         </fieldset>
      </div>
   </div>
</div>
@stop
