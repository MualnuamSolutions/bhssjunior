@extends('layout')

@section('content')

   <h4><i class="fi-page-multiple"></i> Users</h4>
   <hr>
   <table>
      <thead>
         <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Role</th>
         </tr>
      </thead>
      <tbody>
         @foreach($users as $i => $user)
         <tr>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->phone }}</td>
         </tr>
         @endforeach
      </tbody>
   </table>

   {{ $users->links() }}


@stop
