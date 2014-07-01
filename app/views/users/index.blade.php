@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Users'] )

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
         <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach($users as $key => $user)
      <tr>
         <td>{{ $users->getFrom() + $key }}</td>
         <td>{{ $user->email }}</td>
         <td>{{ $user->name }}</td>
         <td>{{ $user->phone }}</td>
         <td>{{ implode('', $user->groups->lists('name')) }}</td>
         <td class="text-right">
            <a class="changepassword button tiny" href="{{ route('users.password', $user->id) }}">
               <i class="fi-lock"></i>
               <span class="hide-for-small-only">&nbsp;Password</span>
            </a>
            @include('partials.actions', ['actions'=> ['edit', 'delete'], 'route' => 'users', 'item' => $user])
         </td>
      </tr>
      @endforeach
      </tbody>
   </table>

   {{ $users->links() }}
   <hr>
   <div class="row">
      <div class="small-12 columns text-right">
         <a href="{{ route('users.create') }}" class="button small">Create New User</a>
      </div>
   </div>
</div>

@stop
