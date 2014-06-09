@extends('layout')

@section('content')
   <ul class="breadcrumbs">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="current">Users</li>
   </ul>

   <div class="panel">
      <h5><i class="fi-page-multiple"></i> Users</h5>
      <hr>

      <table class="small-12">
         <thead>
            <tr>
               <th>#</th>
               <th>Email</th>
               <th>Name</th>
               <th>Phone</th>
               <th>Role</th>
            </tr>
         </thead>
         <tbody>
            @foreach($users as $key => $user)
            <tr>
               <td>{{ $key+$users->getFrom() }}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->name }}</td>
               <td>{{ $user->phone }}</td>
               <td>{{ $user->phone }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>

      {{ $users->links() }}
      <hr>
      <div class="row">
         <div class="small-12 columns text-right">
            <a href="{{ route('users.create') }}" class="button tiny">Create New User</a>
         </div>
      </div>
   </div>

@stop
