(function($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function() {
        if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });

    //Date Picker
    var config;
    config = {
        //locale: 'es-es',
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    };

    $(document).ready(function () {
        $('.datepicker').datepicker(config);
    });


    $(document).ready(function() {
        var $inputFile = $('#image_upload'),
            $image = $('#upload_preview_image'),
            $input = $('[name="upload_crop_result"]'),
            $cropButton = $('#upload_crop_button'),
            $formGroup = $('#upload_from_group');

        function isValidType(file) {
            var fileTypes = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];

            for(var i = 0; i < fileTypes.length; i++) {
                if(file.type === fileTypes[i]) {
                    return true;
                }
            }
            return false;
        }

        //Cargamos Cropper

        function imageCropper() {
            $formGroup.show();
            $cropButton.show();

            $image
                .cropper('destroy')
                .cropper({
                    aspectRatio: 1 / 1,
                    responsive : true,
                    center : false,
                    guides : false,
                    movable: false,
                    zoomable: false,
                    rotatable: false,
                    scalable: false,
                    crop: function(event) {
                        // Output the result data for cropping image.
                        var $x = Math.round(event.detail.x);
                        var $y = Math.round(event.detail.y);
                        var $width = Math.round(event.detail.width);
                        var $height = Math.round(event.detail.height);
                        $input.val($x + ',' + $y + ',' + $width + ',' + $height);
                    }
                });
        }

        $inputFile.on('change', function () {
            var inputFile = this,
                file = inputFile.files[0],
                fileReader = new FileReader();

            if (!isValidType(file)) {
                $formGroup.hide();
                $cropButton.hide();

                if (inputFile.setCustomValidity) {
                    inputFile.setCustomValidity(
                        inputFile.title ? inputFile.title : 'Sólo están permitidas imágenes PNG, JPG y GIF'
                    );
                }

                return;
            }

            if (inputFile.setCustomValidity) {
                inputFile.setCustomValidity('');
            }

            fileReader.readAsDataURL(file);
            fileReader.onload = function () {
                $image
                    .attr('src', this.result)
                    .on('load', imageCropper);
            };
        });

        $cropButton.on('click', function () {
            var canvas = $image.cropper('getCroppedCanvas'),
                dataUrl = canvas.toDataURL();

            $image.attr('src', dataUrl).cropper('destroy').off('load', imageCropper);
            $('[name="picture_crop_image_base_64"]').val(dataUrl);
            $cropButton.hide();
        });

    });


})(jQuery); // End of use strict

