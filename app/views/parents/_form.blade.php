<div class="row">
    {{ Form::open(['route' => 'parents.index', 'method' => 'get', 'class' => 'toolbar']) }}

    <div class="small-12 medium-8 columns">
        <div class="row">
            <div class="medium-5 columns">
                {{ Form::text('regno', Input::get('regno'), ['data-tooltip' => '', 'title' => 'Student registration number', 'placeholder' => 'Registration Number']) }}
            </div>
            <div class="medium-7 columns">
                <div class="row collapse">
                    <div class="small-8 medium-9 large-10 columns">
                        {{ Form::text('contact1', Input::get('contact1'), ['data-tooltip' => '', 'title' => 'This mobile number should be your registered mobile number', 'placeholder' => 'Registered Mobile Number']) }}
                    </div>
                    <div class="small-4 medium-3 large-2 columns">
                        {{ Form::button('View', ['class' => 'button postfix', 'type' => 'submit']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ Form::close() }}
</div>