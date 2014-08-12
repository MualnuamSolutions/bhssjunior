<div class="row">
{{ Form::open(['route' => 'exams.index', 'method' => 'get', 'class' => 'toolbar']) }}

    <div class="small-2 columns">
        {{ Form::select('limit', $limits, Input::get('limit')) }}
    </div>
    <div class="small-1 columns">
        {{ Form::select('assessment', $assessments, Input::get('assessment')) }}
    </div>
    <div class="small-2 columns">
        {{ Form::select('subject', $subjects, Input::get('subject')) }}
    </div>

    <div class="small-2 columns">
        {{ Form::text('exam_date', Input::get('exam_date'), ['placeholder' => 'Pick exam date']) }}
    </div>
    <div class="small-1 columns">
        {{ Form::button('Search', ['class' => 'button postfix', 'type' => 'submit']) }}
    </div>

{{ Form::close() }}
</div>