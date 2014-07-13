$(function () {
    $('#userpic').fileapi({
        url: '/photos/uploader',
        accept: 'image/*',
        imageSize: {minWidth: 30, minHeight: 30},
        elements: {
            active: {show: '.js-upload', hide: '.js-browse'},
            preview: {
                el: '.js-preview',
                width: 200,
                height: 200
            },
            progress: '.js-progress'
        },
        onSelect: function (evt, ui) {
            var file = ui.files[0];
            if (file) {
                $("#userpic-popup").modal({
                    closeOnEsc: true,
                    closeOnOverlayClick: false,
                    onOpen: function (overlay) {

                        $(overlay).on('click', '.js-upload', function () {
                            $.modal().close();
                            $('#userpic').fileapi('upload');
                        });

                        $('.js-img', overlay).cropper({
                            file: file,
                            bgColor: '#fff',
                            maxSize: [$(window).width() - 100, $(window).height() - 100],
                            minSize: [50, 50],
                            selection: '90%',
                            onSelect: function (coords) {
                                $('#userpic').fileapi('crop', file, coords);
                            }
                        });
                    }
                }).open();
            }
        },
        onFileComplete: function (evt, uiEvt) {
            var file = uiEvt.file;
            var json = uiEvt.result;
            var error = uiEvt.error;

            file.data = {
                id: json.id,
                token: json.token
            };

            if (json.status == "OK")
                $("#photo").val(json.photoPath);
        }
    });


    $('#webcam').fileapi({
        url: '/photos/uploader',
        accept: 'image/*',
        autoUpload: true,
        paramName: 'photoFile',
        elements: {
            active: {show: '.js-upload', hide: '.js-webcam'},
            preview: {
                el: '.js-preview',
                width: 200,
                height: 200
            },
            progress: '.js-progress'
        },
        onFileComplete: function (evt, uiEvt) {
            console.log('adsdsd');
            var file = uiEvt.file;
            var json = uiEvt.result;
            var error = uiEvt.error;

            file.data = {
                id: json.id,
                token: json.token
            };

            if (json.status == "OK")
                $("#photo").val(json.photoPath);
        }
    });
    $('.js-webcam', '#webcam').click(function (evt) {
        var modal = $('#webcam-popup').modal({
            closeOnOverlayClick: false,
            onOpen: function (overlay) {
                $('.js-img', overlay).webcam({
                    width: 320,
                    height: 240,
                    error: function (err) {
                        // err — https://developer.mozilla.org/en-US/docs/Web/API/Navigator.getUserMedia
                        $.modal().close();
                        alert("Unfortunately, your browser does not support webcam.");
                    },
                    success: function (webcam) {
                        $(overlay).on('click', '.js-upload', function () {
                            $('#webcam').fileapi('add', webcam.shot());
                            modal.close();
                        });
                    }
                });
            },
            onClose: function (overlay) {
                $('.js-img', overlay).webcam('destroy');
            }
        });
        modal.open();
        evt.preventDefault();
    });

    $('#sign').fileapi({
        url: '/photos/uploader',
        accept: 'image/*',
        imageSize: {minWidth: 30, minHeight: 30},
        elements: {
            active: {show: '.js-upload', hide: '.js-browse'},
            preview: {
                el: '.js-preview',
                width: 245,
                height: 138
            },
            progress: '.js-progress'
        },
        onSelect: function (evt, ui) {
            var file = ui.files[0];
            if (file) {
                $("#sign-popup").modal({
                    closeOnEsc: true,
                    closeOnOverlayClick: false,
                    onOpen: function (overlay) {

                        $(overlay).on('click', '.js-upload', function () {
                            $.modal().close();
                            $('#sign').fileapi('upload');
                        });

                        $('.js-img', overlay).cropper({
                            file: file,
                            bgColor: '#fff',
                            aspectRatio: 16/9,
                            maxSize: [$(window).width() - 100, $(window).height() - 100],
                            minSize: [50, 50],
                            selection: '90%',
                            onSelect: function (coords) {
                                $('#sign').fileapi('crop', file, coords);
                            }
                        });
                    }
                }).open();
            }
        },
        onFileComplete: function (evt, uiEvt) {
            var file = uiEvt.file;
            var json = uiEvt.result;
            var error = uiEvt.error;

            file.data = {
                id: json.id,
                token: json.token
            };

            if (json.status == "OK")
                $("#signature").val(json.photoPath);
        }
    });
});
