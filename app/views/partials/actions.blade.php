@if ( in_array('view', $actions) )
<a class="view" href="{{ route($route . '.show', $item->id) }}"><span class="label secondary"><i class="fi-eye"></i> View</span></a>
@endif

@if ( in_array('edit', $actions) )
<a class="edit" href="{{ route($route . '.edit', $item->id) }}"><span class="label"><i class="fi-page-edit"></i> Edit</span></a>
@endif

@if ( in_array('delete', $actions) )
{{ Form::open(['route' => [$route . '.destroy', $item->id], 'method' => 'delete', 'class' => 'inline']) }}
<button type="submit" class="label alert"><i class="fi-page-delete"></i> Delete</button>
{{ Form::close() }}
@endif
