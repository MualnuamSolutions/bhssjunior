@extends('layout')

@section('content')
@include( 'partials.crumbs', ['current' => 'Photos', 'crumbs' => ['Students' => route('students.index')]] )

<div class="panel">
    <h5><i class="fi-page-edit"></i> Edit Student - {{ $student->name }} ({{ $student->regno }})</h5>
    <hr>

    @include( 'students._submenu', ['active' => 'photos'])

    <div class="row">
        <div class="medium-12 columns">
            <fieldset>
                <legend>Photos</legend>

                <table class="small-12">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="small-4">Photo</th>
                        <th class="small-2">Added</th>
                        <th class="small-2">Default</th>
                        <th class="small-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $key => $photo)
                    <tr>
                        <td>{{ $photos->getFrom() + $key }}</td>
                        <td><img src="{{ asset($photo->path) }}" alt="{{ $student->name }}" class="student-photo" /></td>
                        <td>{{ date('d F, Y h:iA', strtotime($photo->created_at)) }}</td>
                        <td class="text-center">
                            @if(!$photo->default)
                            {{ Form::open(['route' => ['students.defaultPhoto', $student->id], 'method' => 'post', 'class' => 'inline']) }}
                            <button type="submit" name="default" value="{{ $photo->id }}" class="button tiny success"><i
                                    class="fi-check"></i><span class="hide-for-small-only">&nbsp;Set Default</span></button>
                            {{ Form::close() }}
                            @else
                            <h3><i class="fi-check"></i></h3>
                            @endif
                        </td>
                        <td class="text-right">
                            @if( $logged_user->hasAccess('students.removePhoto'))
                            {{ Form::open(['route' => ['students.removePhoto', $student->id], 'method' => 'post', 'class' => 'inline']) }}
                            <button type="submit" class="button tiny alert" name="delete" value="{{ $photo->id }}" onclick="return confirm('Are you sure you want to delete?');"><i
                                    class="fi-x"></i><span class="hide-for-small-only">&nbsp;Delete</span></button>
                            {{ Form::close() }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                @if( $logged_user->hasAccess('students.addPhoto'))
                <hr>
                <div class="row">
                    <div class="small-12 columns text-right">
                        <a class="button small success" href="{{ route('students.addPhoto', $student->id) }}">Add
                            Photo</a>
                    </div>
                </div>
                @endif

            </fieldset>
        </div>
    </div>

    {{ $photos->links() }}
</div>
@stop
