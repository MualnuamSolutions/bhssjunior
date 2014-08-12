@if ( in_array('view', $actions) )
    @if($logged_user->hasAccess($route . '.show'))
    <a class="view button tiny secondary" title="View" href="{{ route($route . '.show', $item->id) }}">
       <i class="fi-eye"></i>
    </a>
    @endif
@endif

@if($logged_user->hasAccess($route . '.edit'))
    @if ( in_array('edit', $actions) )
    <a class="edit button tiny" title="Edit" href="{{ route($route . '.edit', $item->id) }}">
       <i class="fi-page-edit"></i>
    </a>
    @endif
@endif

@if($logged_user->hasAccess($route . '.destroy'))
    @if ( in_array('delete', $actions) )
    {{ Form::open(['route' => [$route . '.destroy', $item->id], 'method' => 'delete', 'class' => 'inline']) }}
    <button type="submit" class="button tiny alert" title="Delete" onclick="return confirm('Are you sure you want to delete?');"><i
          class="fi-x"></i></button>
    {{ Form::close() }}
    @endif
@endif
