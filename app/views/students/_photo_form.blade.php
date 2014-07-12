<div class="row">
   <div class="medium-6 columns">
      <fieldset>
         <legend>New Photo</legend>

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

<div class="popup" id="webcam-popup" style="display: none;">
   <div class="popup__body">
      <div class="js-img"></div>
      <div class="js-upload btn btn_browse btn_browse_small">Capture</div>
   </div>
</div>

@stop
