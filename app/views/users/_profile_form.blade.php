<div class="row">
    <div class="large-4 columns">
        <fieldset>
            <legend>Login Information</legend>
            <div class="row">

                {{ Form::label('email', 'Email Address', ['class' => $errors->has('email')?'error':'']) }}
                {{ Form::text('email', null, ['placeholder' => 'You must enter email address', 'class' => $errors->has('email')?'error':'']) }}

                @if($errors->has('email'))
                <small class="error">{{ $errors->first('email') }}</small>
                @endif

                {{ Form::label('password', 'New Password', ['class' => $errors->has('password')?'error':'']) }}
                {{ Form::password('password', ['autocomplete' => 'off', 'placeholder' => 'Leave blank to retain current password', 'class' => $errors->has('password')?'error':'']) }}

                @if($errors->has('password'))
                <small class="error">{{ $errors->first('password') }}</small>
                @endif

                {{ Form::label('password_confirmation', 'Confirm New Password', ['class' => $errors->has('password_confirmation')?'error':'']) }}
                {{ Form::password('password_confirmation', ['placeholder' => 'Confirm password', 'class' => $errors->has('password_confirmation')?'error':'']) }}

                @if($errors->has('password_confirmation'))
                <small class="error">{{ $errors->first('password_confirmation') }}</small>
                @endif

            </div>
        </fieldset>

        <fieldset>
            <legend>Signature</legend>
            <div id="sign" class="sign text-center">
                <div class="js-preview sign__preview">
                    @if( isset($user->signature) && $user->signature != "" )
                    <img src="{{ asset($user->signature) }}" alt=""/>
                    @endif
                </div>
                <div class="btn btn-success js-fileapi-wrapper">
                    <div class="js-browse">
                        <span class="btn-txt">Browse</span>
                        {{ Form::file('photoFile', array('id'=>'signatureFile')) }}
                        {{ Form::hidden('signature', '', array('id'=>'signature')) }}
                    </div>
                    <div class="js-upload" style="display: none;">
                        <div class="progress progress-success">
                            <div class="js-progress bar"></div>
                        </div>
                        <span class="btn-txt">Uploading</span>
                    </div>
                </div>
            </div>
        </fieldset>

    </div>

    <div class="large-8 columns">
        <fieldset>
            <legend>Personal Detail</legend>

            <div class="row">
                <div class="small-6 columns">
                    {{ Form::label('name', 'Full Name', ['class' => $errors->has('name')?'error':'']) }}
                    {{ Form::text('name', null, ['placeholder' => 'You must enter full name', 'class' => $errors->has('name')?'error':'']) }}

                    @if($errors->has('name'))
                    <small class="error">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="small-6 columns">
                    {{ Form::label('father', 'Father\'s Name', ['class' => ($errors->has('father')?'error':'')]) }}
                    {{ Form::text('father', null, ['class' => $errors->has('father')?'error':'']) }}

                    @if($errors->has('father'))
                    <small class="error">{{ $errors->first('father') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="small-4 columns">
                    {{ Form::label('short_name', 'Short Name', ['class' => $errors->has('short_name')?'error':'']) }}
                    {{ Form::text('short_name', null) }}

                    @if($errors->has('short_name'))
                    <small class="error">{{ $errors->first('short_name') }}</small>
                    @endif
                </div>
                <div class="small-4 columns">
                    {{ Form::label('phone', 'Contact Number', ['class' => $errors->has('phone')?'error':'']) }}
                    {{ Form::text('phone', null, ['placeholder' => 'Contact number is optional']) }}

                    @if($errors->has('phone'))
                    <small class="error">{{ $errors->first('phone') }}</small>
                    @endif
                </div>
                <div class="small-4 columns">
                    {{ Form::label('epic_no', 'EPIC No', ['class' => $errors->has('epic_no')?'error':'']) }}
                    {{ Form::text('epic_no', null, ['placeholder' => 'Contact number is optional']) }}

                    @if($errors->has('epic_no'))
                    <small class="error">{{ $errors->first('epic_no') }}</small>
                    @endif
                </div>
            </div>

            {{ Form::label('address', 'Address', ['class' => $errors->has('address')?'error':'']) }}
            {{ Form::textarea('address', null, ['rows' => '', 'placeholder' => 'Address is optional']) }}

            @if($errors->has('address'))
            <small class="error">{{ $errors->first('address') }}</small>
            @endif

            <div class="row">
                <div class="small-6 columns">
                    {{ Form::label('dob', 'Date of Birth', ['class' => ($errors->has('dob')?'error':'')]) }}
                    {{ Form::text('dob', null, ['readonly' => 'readonly', 'placeholder' => 'Pick date', 'class' => 'fdatepicker' . ($errors->has('dob') ? ' error' : '')]) }}

                    @if($errors->has('dob'))
                    <small class="error">{{ $errors->first('dob') }}</small>
                    @endif
                </div>
                <div class="small-6 columns">
                    {{ Form::label('date_of_joining', 'Date of Joining', ['class' => ($errors->has('date_of_joining')?'error':'')]) }}
                    {{ Form::text('date_of_joining', null, ['readonly' => 'readonly', 'placeholder' => 'Pick date', 'class' => 'fdatepicker' . ($errors->has('date_of_joining') ? ' error' : '')]) }}

                    @if($errors->has('date_of_joining'))
                    <small class="error">{{ $errors->first('date_of_joining') }}</small>
                    @endif
                </div>
            </div>

            {{ Form::label('qualification', 'Qualification', ['class' => $errors->has('qualification')?'error':'']) }}
            {{ Form::text('qualification', null) }}

            @if($errors->has('qualification'))
            <small class="error">{{ $errors->first('qualification') }}</small>
            @endif

            {{ Form::label('professional_training', 'Professional Training', ['class' => $errors->has('professional_training')?'error':'']) }}
            {{ Form::text('professional_training', null) }}

            @if($errors->has('professional_training'))
            <small class="error">{{ $errors->first('professional_training') }}</small>
            @endif

        </fieldset>

        <fieldset>
            <legend>Photo</legend>
            <div class="row">
                <div class="medium-6 columns">
                    <div id="userpic" class="userpic text-center">
                        <div class="js-preview userpic__preview">
                            @if( isset($user->photo) && $user->photo != "" )
                            <img src="{{ asset($user->photo) }}" alt=""/>
                            @endif
                        </div>
                        <div class="btn btn-success js-fileapi-wrapper">
                            <div class="js-browse">
                                <span class="btn-txt">Browse</span>
                                {{ Form::file('photoFile', array('id'=>'photoFile')) }}
                                {{ Form::hidden('photo', '', array('id'=>'photo')) }}
                            </div>
                            <div class="js-upload" style="display: none;">
                                <div class="progress progress-success">
                                    <div class="js-progress bar"></div>
                                </div>
                                <span class="btn-txt">Uploading</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="medium-6 columns">
                    <div id="webcam" class="webcam text-center">
                        <div class="js-preview webcam__preview"></div>
                        <div class="btn btn-success">
                            <div class="js-webcam">
                                <span class="btn-txt">Webcam</span>
                            </div>
                            <div class="js-upload" style="display: none;">
                                <div class="progress progress-success">
                                    <div class="js-progress bar"></div>
                                </div>
                                <span class="btn-txt">Uploading</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </fieldset>

    </div>

</div>
<hr/>
<div class="row">
    <div class="large-12 columns text-right">
        {{ Form::button('Save', ['class' => 'button large success', 'type' => 'submit']) }}
    </div>
</div>

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('jquery.fileapi/jcrop/jquery.Jcrop.min.css') }}">
@stop

@section('scripts')
<script>
    window.FileAPI = {
        debug: false // debug mode
        , staticPath: '{{ asset('jquery.fileapi / FileAPI / ') }}' // path to *.swf
    }
    ;
</script>
<script src="{{ asset('jquery.fileapi/FileAPI/FileAPI.min.js') }}"></script>
<script src="{{ asset('jquery.fileapi/FileAPI/FileAPI.exif.js') }}"></script>
<script src="{{ asset('the-modal/jquery.the-modal.js') }}"></script>
<script src="{{ asset('jquery.fileapi/jquery.fileapi.min.js') }}"></script>
<script src="{{ asset('jquery.fileapi/jcrop/jquery.Jcrop.min.js') }}"></script>

<script src="{{ asset('jquery.fileapi/the-uploader.js') }}"></script>

<div class="popup" id="userpic-popup" style="display: none;">
    <div class="popup__body">
        <div class="js-img"></div>
        <div class="js-upload btn btn_browse btn_browse_small">Upload</div>
    </div>
</div>

<div class="popup" id="sign-popup" style="display: none;">
    <div class="popup__body">
        <div class="js-img"></div>
        <div class="js-upload btn btn_browse btn_browse_small">Upload</div>
    </div>
</div>

<div class="popup" id="webcam-popup" style="display: none;">
    <div class="popup__body">
        <div class="js-img"></div>
        <div class="js-upload btn btn_browse btn_browse_small">Capture</div>
    </div>
</div>

@stop