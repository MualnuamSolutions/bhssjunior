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
                        <th class="small-3">Roll No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Father</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                  @if (0 == $classroom->students->count())
                     <tr>
                        <td colspan="3" class="text-center">No students</td>
                     </tr>
                  @endif

                  @foreach($students as $key => $student)
                     <tr>
                        <td>{{ $student->pivot->roll_no }}</td>
                        <td>
                           {{ $student->name }}
                           <span>
                              {{ $student->gender == "Male" && ($student->father && $student->mother) ? 's/o' : 'd/o' }}
                              {{ $student->father ? : $student->mother }}
                           </span>
                        </td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->father }}</td>
                        <td class="text-right">
                           @include('partials.actions', ['actions' => ['edit'], 'route' => 'students', 'item' => $student])
                        </td>
                     </tr>
                  @endforeach
                  </tbody>
               </table>

               <hr>
               <div class="row">
                  <div class="small-12 columns text-right">
                     <a class="button small info" href="{{ route('classrooms.addstudents', $classroom->id) }}">Add Students</a>
                  </div>
               </div>
            </fieldset>
         </div>
      </div>
   </div>
@stop
