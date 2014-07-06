@extends('layout')

@section('content')

@include('partials.crumbs', ['current' => $classroom->name, 'crumbs' => ['Class Rooms' => route('classrooms.index')]])

<div class="panel">
   <h5><i class="fi-thumbnails"></i> {{ $classroom->name }}</h5>
   <hr>

   <div class="row">
      <div class="medium-4 columns">
         <fieldset>
            <legend>Subjects</legend>
            <ul class="side-nav">
               @foreach ($classroom->subjects as $key => $subject)
               <li>{{ $key+1 }}. {{ $subject->name}}</li>
               @endforeach
            </ul>
         </fieldset>
      </div>
      <div class="medium-8 columns">
         <fieldset>
            <legend>Students ({{ $recentAcademicSession->session }})</legend>
            <table class="small-12">
               <thead>
               <tr>
                  <th class="small-2">R.No</th>
                  <th class="small-7">Name</th>
                  <th class="small-3"></th>
               </tr>
               </thead>
               <tbody>
               @if (0 == $enrollments->count())
               <tr>
                  <td colspan="3" class="text-center">No students</td>
               </tr>
               @endif

               @foreach($enrollments as $key => $enrollment)
               <tr>
                  <td>{{ $enrollment->roll_no }}</td>
                  <td>
                     {{ $enrollment->student->name }}<br>
                     <small>
                        @if ($enrollment->student->gender == "Male" && $enrollment->student->father)
                        s/o
                        @elseif ($enrollment->student->gender == "Female" && $enrollment->student->mother)
                        d/o
                        @else
                        c/o
                        @endif
                        {{ $enrollment->student->father ? : $enrollment->student->mother }}
                     </small>
                  </td>
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
                  <a class="button small success" href="{{ route('classrooms.addstudents', $classroom->id) }}">Add
                     Students</a>
                  <a class="button small info" href="{{ route('classrooms.students', $classroom->id) }}">Manage
                     Students</a>
               </div>
            </div>
         </fieldset>
      </div>
   </div>
</div>
@stop
