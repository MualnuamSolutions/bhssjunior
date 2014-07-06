<div class="row">
{{ Form::open(['route' => 'students.index', 'method' => 'get', 'class' => 'toolbar']) }}

    <div class="small-3 columns">
        {{ Form::select('order', $orderOptions, Input::get('order')) }}
    </div>
    <div class="small-2 columns">
        {{ Form::select('limit', $limits, Input::get('limit')) }}
    </div>

    <div class="small-6 columns">
        <div class="row collapse">
            <div class="small-9 medium-10 large-10 columns">
                {{ Form::text('s', Input::get('s'), ['placeholder' => 'Search name, reg.no, father and contact']) }}
            </div>
            <div class="small-3 medium-2 large-2 columns">
                {{ Form::button('Search', ['class' => 'button postfix', 'type' => 'submit']) }}
            </div>
        </div>
    </div>

{{ Form::close() }}
</div>