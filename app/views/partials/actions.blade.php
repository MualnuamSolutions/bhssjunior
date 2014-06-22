@if ( in_array('view', $actions) )
<a class="view  button tiny secondary" href="{{ route($route . '.show', $item->id) }}"><i class="fi-eye"></i><span class="hide-for-small-only">&nbsp;View</span></a>
@endif

@if ( in_array('edit', $actions) )
<a class="edit  button tiny" href="{{ route($route . '.edit', $item->id) }}"><i class="fi-page-edit"></i><span class="hide-for-small-only">&nbsp;Edit</span></a>
@endif

@if ( in_array('delete', $actions) )
{{ Form::open(['route' => [$route . '.destroy', $item->id], 'method' => 'delete', 'class' => 'inline']) }}
<button type="submit" class="button  tiny alert"><i class="fi-x"></i><span class="hide-for-small-only">&nbsp;Delete</span></button>
{{ Form::close() }}
@endif
