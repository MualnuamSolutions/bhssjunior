@extends('layout')

@section('content')
   <ul class="breadcrumbs">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('classrooms.index') }}">Class Rooms</a></li>
      <li class="current">{{ $classroom->name }}</li>
   </ul>

   <div class="panel">
      <h5><i class="fi-thumbnails"></i> {{ $classroom->name }}</h5>
      <hr>
{{ $classroom->current_academic_session }}
      <div class="row">
         <div class="medium-4 columns">
            <fieldset>
               <legend>Subjects</legend>
               <ul class="side-nav">
                  <li>1. Link 1</li>
                  <li>2. Link 2</li>
                  <li>3. Link 3</li>
                  <li>4. Link 4</li>
               </ul>
            </fieldset>
         </div>
         <div class="medium-8 columns">
            <fieldset>
               <legend>Students ({{ $academicSession->start . " - " . $academicSession->end }})</legend>
               <table class="small-12">
                  <thead>
                     <tr>
                        <th class="small-3">Roll No</th>
                        <th>Name</th>
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
                     <a class="button tiny info" href="{{ route('classrooms.addstudents', $classroom->id) }}">Add Student</a>
                  </div>
               </div>
            </fieldset>
         </div>
      </div>
   </div>
@stop
