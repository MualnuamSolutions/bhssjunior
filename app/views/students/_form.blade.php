<div class="row">
   <div class="medium-6 columns">
      <fieldset>
         <legend>Personal Detail</legend>

         {{ Form::label('name', 'Name', ['class' => ($errors->has('name')?'error':'')]) }}
         {{ Form::text('name', null, ['class' => $errors->has('name')?'error':'']) }}
         @if($errors->has('name'))
         <small class="error">{{ $errors->first('name') }}</small>
         @endif

         {{ Form::label('gender', 'Gender', ['class' => ($errors->has('gender')?'error':'')]) }}
         {{ Form::select('gender', Student::$genders, null, ['class' => $errors->has('gender')?'error':'']) }}
         @if($errors->has('gender'))
         <small class="error">{{ $errors->first('gender') }}</small>
         @endif

         {{ Form::label('dob', 'Date of Birth', ['class' => ($errors->has('dob')?'error':'')]) }}
         {{ Form::text('dob', null, ['readonly' => 'readonly', 'placeholder' => 'Pick date', 'class' => 'fdatepicker' . ($errors->has('dob') ? ' error' : '')]) }}
         @if($errors->has('dob'))
         <small class="error">{{ $errors->first('dob') }}</small>
         @endif

         {{ Form::label('father', 'Father\'s Name', ['class' => ($errors->has('father')?'error':'')]) }}
         {{ Form::text('father', null, ['class' => $errors->has('father')?'error':'']) }}
         @if($errors->has('father'))
         <small class="error">{{ $errors->first('father') }}</small>
         @endif

         {{ Form::label('fathers_occupation', 'Father\'s Occupation', ['class' => ($errors->has('fathers_occupation')?'error':'')]) }}
         {{ Form::text('fathers_occupation', null, ['class' => $errors->has('fathers_occupation')?'error':'']) }}
         @if($errors->has('fathers_occupation'))
         <small class="error">{{ $errors->first('fathers_occupation') }}</small>
         @endif

         {{ Form::label('mother', 'Mother\'s Name', ['class' => ($errors->has('mother')?'error':'')]) }}
         {{ Form::text('mother', null, ['class' => $errors->has('mother')?'error':'']) }}
         @if($errors->has('mother'))
         <small class="error">{{ $errors->first('mother') }}</small>
         @endif

         {{ Form::label('mothers_occupation', 'Mother\'s Occupation', ['class' => ($errors->has('mothers_occupation')?'error':'')]) }}
         {{ Form::text('mothers_occupation', null, ['class' => $errors->has('mothers_occupation')?'error':'']) }}
         @if($errors->has('mothers_occupation'))
         <small class="error">{{ $errors->first('mothers_occupation') }}</small>
         @endif

         {{ Form::label('contact1', 'Primary Contact', ['class' => ($errors->has('contact1')?'error':'')]) }}
         {{ Form::text('contact1', null, ['class' => $errors->has('contact1')?'error':'']) }}
         @if($errors->has('contact1'))
         <small class="error">{{ $errors->first('contact1') }}</small>
         @endif

         {{ Form::label('contact2', 'Alternate Contact', ['class' => ($errors->has('contact2')?'error':'')]) }}
         {{ Form::text('contact2', null, ['class' => $errors->has('contact2')?'error':'']) }}
         @if($errors->has('contact2'))
         <small class="error">{{ $errors->first('contact2') }}</small>
         @endif

      </fieldset>
   </div>

   <div class="medium-6 columns">
      <fieldset>
         <legend>Enrollment</legend>

         {{ Form::label('academic_session', 'Academic Session', ['class' => ($errors->has('academic_session') ? 'error' : '')]) }}
         {{ Form::select('academic_session', $academicSessions, null, ['class' => $errors->has('academic_session')?'error':'']) }}
         @if($errors->has('academic_session'))
         <small class="error">{{ $errors->first('academic_session') }}</small>
         @endif

         {{ Form::label('class_room', 'Class', ['class' => ($errors->has('class_room') ? 'error' : '')]) }}
         {{ Form::select('class_room', $classRooms, null, ['class' => $errors->has('class_room')?'error':'']) }}
         @if($errors->has('class_room'))
         <small class="error">{{ $errors->first('class_room') }}</small>
         @endif

      </fieldset>

      <fieldset>
         <legend>Photo</legend>

         <div class="row">
            <div class="medium-6 columns">
               <div id="userpic" class="userpic text-center">
                  <div class="js-preview userpic__preview"></div>
                  <div class="btn btn-success js-fileapi-wrapper">
                     <div class="js-browse">
                        <span class="btn-txt">Browse</span>
                        {{ Form::file('photoFile', array('id'=>'photoFile')) }}
                        {{ Form::hidden('photo', '', array('id'=>'photo')) }}
                     </div>
                     <div class="js-upload" style="display: none;">
                        <div class="progress progress-success"><div class="js-progress bar"></div></div>
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
                        <div class="progress progress-success"><div class="js-progress bar"></div></div>
                        <span class="btn-txt">Uploading</span>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </fieldset>
   </div>
</div>


<div class="row">
   <div class="small-12 columns text-right">
      <hr>
      {{ Form::button('Submit', ['class' => 'button large success', 'type' => 'submit']) }}
   </div>
</div>

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('jquery.fileapi/jcrop/jquery.Jcrop.min.css') }}">
@stop

@section('scripts')
<script>
    window.FileAPI = {
          debug: false // debug mode
        , staticPath: '{{ asset('jquery.fileapi/FileAPI/') }}' // path to *.swf
    };
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

<div class="popup" id="webcam-popup" style="display: none;">
   <div class="popup__body">
      <div class="js-img"></div>
      <div class="js-upload btn btn_browse btn_browse_small">Capture</div>
   </div>
</div>

@stop
