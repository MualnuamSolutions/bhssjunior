<div class="row">
    <div class="medium-2 columns">
        {{ Form::label('term', 'Term', ['class' => ($errors->has('term') ? 'error' : '')]) }}

        {{ Form::select('term', Assessment::$terms, null, ['class' => $errors->has('term') ? 'error' : '']) }}

        @if($errors->has('term'))
        <small class="error">{{ $errors->first('term') }}</small>
        @endif
    </div>

    <div class="medium-4 columns">
        {{ Form::label('name', 'Assessment Name', ['class' => ($errors->has('name') ? 'error' : '')]) }}

        {{ Form::text('name', null, ['class' => $errors->has('name') ? 'error' : '']) }}

        @if($errors->has('name'))
        <small class="error">{{ $errors->first('name') }}</small>
        @endif
    </div>

    <div class="medium-2 columns">
        {{ Form::label('short_name', 'Short Name', ['class' => ($errors->has('short_name') ? 'error' : '')]) }}

        {{ Form::text('short_name', null, ['class' => $errors->has('short_name') ? 'error' : '']) }}

        @if($errors->has('short_name'))
        <small class="error">{{ $errors->first('short_name') }}</small>
        @endif
    </div>

    <div class="medium-2 columns">
        {{ Form::label('weightage', 'Weightage', ['class' => ($errors->has('weightage')?'error':'')]) }}

        <div class="row collapse">
            <div class="small-10 medium-7 columns">
                {{ Form::text('weightage', null, ['class' => $errors->has('weightage')?'error':'']) }}
            </div>
            <div class="small-2 medium-5 columns">
                <span class="postfix"> / 100</span>
            </div>
        </div>

        @if($errors->has('weightage'))
        <small class="error">{{ $errors->first('weightage') }}</small>
        @endif
    </div>

    <div class="medium-2 columns">
        {{ Form::label('order', 'Order', ['class' => ($errors->has('order') ? 'error' : '')]) }}

        {{ Form::text('order', null, ['class' => $errors->has('order') ? 'error' : '']) }}

        @if($errors->has('order'))
        <small class="error">{{ $errors->first('order') }}</small>
        @endif
    </div>

    <div class="medium-12 columns">
        {{ Form::label('description', 'Description', ['class' => ($errors->has('description') ? 'error' : '')]) }}

        {{ Form::text('description', null, ['class' => $errors->has('description') ? 'error' : '']) }}

        @if($errors->has('description'))
        <small class="error">{{ $errors->first('description') }}</small>
        @endif
    </div>
</div>


<div class="row">
<div class="small-12 columns text-right">
<hr>
{{ Form::button('Submit', ['class' => 'large button success', 'type' => 'submit']) }}
</div>
</div>
