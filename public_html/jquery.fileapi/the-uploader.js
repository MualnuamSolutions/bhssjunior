jQuery(function ($) {
   var photoCropWindow = $('#photo-crop-window').html();
   var $photoCropWindow = $(photoCropWindow).appendTo('body');

   $('#photo-uploader').fileapi({
      url: '{{ route('student.uploadPhoto') }}',
      accept: 'image/*',
      imageSize: { minWidth: 200, minHeight: 200 },
      elements: {
         active: { show: '.js-upload', hide: '.js-browse' },
         preview: {
            el: '.js-preview',
            width: 200,
            height: 200
         },
         progress: '.js-progress'
      },
      onSelect: function (evt, ui){
            var file = ui.files[0];
            if (file) {
                $photoCropWindow.modal({
                    closeOnEsc: true,
                    closeOnOverlayClick: false,
                    onOpen: function (overlay){

                        $(overlay).on('click', '.js-upload', function (){
                            $.modal().close();
                            $('#photo-uploader').fileapi('upload');
                        });

                        $('.js-img', overlay).cropper({
                            file: file,
                            bgColor: '#fff',
                            maxSize: [$(window).width()-100, $(window).height()-100],
                            minSize: [200, 200],
                            selection: '90%',
                            onSelect: function (coords){
                                $('#photo-uploader').fileapi('crop', file, coords);
                            }
                        });
                    }
                }).open();
            }
        },
        onFileComplete: function (evt, uiEvt){
            var file = uiEvt.file;
            var json = uiEvt.result;
            var error = uiEvt.error;

            file.data = {
                id: json.id,
                token: json.token
            };

            if(json.status == "OK")
                $("#photo").val(json.photoPath);
        }
    });

   $('#webcam').fileapi({
      url: '{{ route('student.uploadPhoto') }}',
      accept: 'image/*',
      autoUpload: true,
      elements: {
         active: { show: '.js-upload', hide: '.js-webcam' },
         preview: {
            el: '.js-preview',
            width: 200,
            height: 200
         },
         progress: '.js-progress'
      }
   });

   $('.js-webcam', '#webcam').click(function (evt){
      var modal = $photoCropWindow.modal({
         closeOnOverlayClick: false,
         onOpen: function (overlay){
            $('.js-img', overlay).webcam({
               width: 320,
               height: 240,
               error: function (err){
                  // err — https://developer.mozilla.org/en-US/docs/Web/API/Navigator.getUserMedia
                  $.modal().close();
                  alert("Unfortunately, your browser does not support webcam.");
               },
               success: function (webcam){
                  $(overlay).on('click', '.js-upload', function (){
                     $('#webcam').fileapi('add', webcam.shot());
                     modal.close();
                  });
               }
            });
         },
         onClose: function (overlay){
            $('.js-img', overlay).webcam('destroy');
         }
      });
      modal.open();
      evt.preventDefault();
   });
});
