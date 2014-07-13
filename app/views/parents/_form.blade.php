<div class="row">
    {{ Form::open(['route' => 'parents.index', 'method' => 'get', 'class' => 'toolbar']) }}

    <div class="small-8 columns">
        <div class="row">
            <div class="small-5 columns">
                {{ Form::text('regno', Input::get('regno'), ['data-tooltip' => '', 'title' => 'Student registration number', 'placeholder' => 'Registration Number']) }}
            </div>
            <div class="small-7 columns">
                <div class="row collapse">
                    <div class="small-9 medium-10 large-10 columns">
                        {{ Form::text('contact1', Input::get('contact1'), ['data-tooltip' => '', 'title' => 'This mobile number should be your registered mobile number', 'placeholder' => 'Registered Mobile Number']) }}
                    </div>
                    <div class="small-3 medium-2 large-2 columns">
                        {{ Form::button('View', ['class' => 'button postfix', 'type' => 'submit']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ Form::close() }}
</div>