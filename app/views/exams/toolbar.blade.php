<div class="row">
{{ Form::open(['route' => 'exams.index', 'method' => 'get', 'class' => 'toolbar']) }}

    <div class="large-2 columns">
        {{ Form::select('limit', $limits, Input::get('limit')) }}
    </div>

    <div class="large-2 columns">
        {{ Form::select('assessment', $assessments, Input::get('assessment')) }}
    </div>

    <div class="large-2 columns">
        {{ Form::select('subject', $subjects, Input::get('subject')) }}
    </div>

    @if($logged_user->inGroup($adminGroup))
    <div class="large-2 columns">
        {{ Form::select('teacher', $teachers, Input::get('teacher')) }}
    </div>
    @endif

    <div class="large-2 columns">
        {{ Form::text('exam_date', Input::get('exam_date'), ['placeholder' => 'Pick exam date', 'class' => 'fdatepicker']) }}
    </div>

    <div class="large-2 columns">
        {{ Form::button('Search', ['class' => 'button postfix', 'type' => 'submit']) }}
    </div>

{{ Form::close() }}
</div>