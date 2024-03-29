$(document).ready(function () {
    'use strict'

    /*-----------------------------------
    Navbar
    -----------------------------------*/
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        var $el = $(this)
        var $parent = $(this).offsetParent('.dropdown-menu')
        if (!$(this).next().hasClass('show')) {
            $(this)
                .parents('.dropdown-menu')
                .first()
                .find('.show')
                .removeClass('show')
        }
        var $subMenu = $(this).next('.dropdown-menu')
        $subMenu.toggleClass('show')

        $(this).parent('li').toggleClass('show')

        $(this)
            .parents('li.nav-item.dropdown.show')
            .on('hidden.bs.dropdown', function (e) {
                $('.dropdown-menu .show').removeClass('show')
            })

        if (!$parent.parent().hasClass('navbar-nav')) {
            $el.next().css({
                top: $el[0].offsetTop,
                left: $parent.outerWidth() - 4,
            })
        }

        return false
    })

    if ($(window).width() < 1200) {
        $(document).on('click', function (event) {
            var clickover = $(event.target)
            var _opened = $('#navbarSupportedContent').hasClass('show')
            if (
                _opened === true &&
                !clickover.is('.navbar-nav li, .navbar-nav .dropdown *')
            ) {
                $('button.navbar-toggler').trigger('click')
            }
        })
    }

    /*--------------------------------------------
    Navbar Search Button
    --------------------------------------------*/

    $('.nav-search-toggle').on('click', function (e) {
        e.preventDefault()
        $('.nav-search form').slideToggle()
    })

    /*--------------------------------------------
    Bookmark
    --------------------------------------------*/

    $('.lrn-listing-wrap .favourite').on('click', function (e) {
        e.preventDefault()
        $(this).toggleClass('active')
    })

    /*--------------------------------------------
    Listing Status
    --------------------------------------------*/

    $('.listing-filter-block .status a').on('click', function (e) {
        e.preventDefault()
        $(this).toggleClass('active')
    })

    /*--------------------------------------------
    Share Listing
    --------------------------------------------*/

    $('.listing-share-button').on('click', function (e) {
        e.preventDefault()
        $(this).siblings('.share-icons').fadeToggle()
    })

    /*--------------------------------------------
    Listing Search Filter
    --------------------------------------------*/

    $('.collapse-button').on('click', function (e) {
        e.preventDefault()
        $('.listing-filter-block').slideToggle()
    })

    /*--------------------------------------------
    Listing View Controller
    --------------------------------------------*/

    $('.search-result-view-control .view-change').on('click', function (e) {
        e.preventDefault()
        $('.search-result-view-control .view-change').removeClass('active')
        $(this).addClass('active')

        if ($('.search-result-view-control .grid-view').hasClass('active')) {
            $('.listing-result-block .row .result-item')
                .removeClass('col-12')
                .addClass('col-md-6')
            $('.result-item .lrn-listing-wrap').removeClass('listing-list')

            $('.listing-result-block .row .map-top-result-item')
                .removeClass('col-12')
                .addClass('col-md-6')
            $('.map-top-result-item .lrn-listing-wrap').removeClass(
                'listing-list'
            )
        } else if (
            $('.search-result-view-control .list-view').hasClass('active')
        ) {
            $('.listing-result-block .row .result-item')
                .removeClass('col-md-6')
                .addClass('col-12')
            $('.result-item .lrn-listing-wrap').addClass('listing-list')

            $('.listing-result-block .row .map-top-result-item')
                .removeClass('col-md-6')
                .addClass('col-12')
            $('.map-top-result-item .lrn-listing-wrap').addClass('listing-list')
        }
    })

    /*--------------------------------------------
    FAQ Generator
    --------------------------------------------*/

    if ($('#tab-generator').length > 0) {
        var navTab = $('#nav-tab')
        var navTabContent = $('#nav-tabContent')
        var countTab = $('#nav-tab').length

        $('#tab-generator').on('click', '#addnew-tab', function (e) {
            e.preventDefault()
            countTab++
            var tab =
                '<a class="nav-item nav-link" id="tab_' +
                countTab +
                '" data-toggle="tab" href="#nav_' +
                countTab +
                '" role="tab" aria-controls="nav-home" aria-selected="true">FAQ ' +
                countTab +
                '</a>'
            var content =
                '<div class="tab-pane fade" id="nav_' +
                countTab +
                '" role="tabpanel">'
            content +=
                '<div class="form-group"><input name="faq_title[]" type="text" class="form-control" placeholder="Question" aria-required="true"></div>'
            content +=
                '<div class="form-group"><textarea name="faq_content[]"  rows="4" cols="25" placeholder="Answer" class="form-control"></textarea></div>'
            content + '</div>'

            // insert tab
            navTab.append(tab)
            navTabContent.append(content)
            $('#tab_' + countTab).click()
        })
    }

    /*--------------------------------------------
    Wicked Picker
    --------------------------------------------*/

    $('.set-time').wickedpicker()
    $('.selector').wickedpicker({
        // current time
        now: new Date(),

        // 12- or 24-hour format
        twentyFour: false,

        // CSS classes
        upArrow: 'wickedpicker__controls__control-up',
        downArrow: 'wickedpicker__controls__control-down',
        close: 'wickedpicker__close',
        hoverState: 'hover-state',

        // title

        title: 'Timepicker',
    })

    /*--------------------------------------------
    Image Uploader
    --------------------------------------------*/

    $('div').on('click', '.closeDiv', function () {
        $(this).parents('.divThumbnail').remove()
        $('#upload-input').val('')
    })

    var fileInput = document.getElementById('upload-input')

    if (fileInput) {
        fileInput.addEventListener(
            'change',
            function (e) {
                var filesVAR = this.files
                showThumbnail(filesVAR)
            },
            false
        )
    }

    function showThumbnail(files) {
        var file = files[0]
        var $thumbnail = $('#thumbnail').get(0)

        var $image = $('<img>', {
            class: 'imgThumbnail img-fluid',
        })
        var $pDiv = $('<div>', {
            class: 'divThumbnail',
        })
        var $div = $('<div>', {
            class: 'closeDiv',
        }).html('<span class="ti-close"></span>')

        $pDiv.append($image, $div).appendTo($thumbnail)
        var reader = new FileReader()
        reader.onload = function (e) {
            $image[0].src = e.target.result
        }
        var ret = reader.readAsDataURL(file)
        var canvas = document.createElement('canvas')
        $image.on('load', function () {
            // ctx.drawImage($image[0], 100, 100);
        })
    }

    /*--------------------------------------------
    Add Socail Field
    --------------------------------------------*/

    $(document).on('click', '.social-network-block .delete', function () {
        $(this).parents('.form-group').remove()
    })

    $('.social-networks .add-field-button').on('click', function (e) {
        e.preventDefault()

        var formGroup = document.createElement('div')
        formGroup.setAttribute('class', 'form-group')
        var slct =
            '<select name="social_icon[]" class="form-control add-social-link"><option value="">Select Network</option>\n' +
            '                                        <option value="facebook">Facebook</option>\n' +
            '                                        <option value="twitter">Twitter</option>\n' +
            '                                        <option value="linkedin">Linkedin</option>\n' +
            '                                        <option value="instagram">Instagram</option>\n' +
            '                                        <option value="pinterest">Pinterest</option></select>'
        var npt =
            '<input type="text" name="social_url[]" placeholder="Enter Link" class="form-control social-link-input">'
        var dlt = '<div class="delete"><i class="far fa-trash-alt"></i></div>'

        var cln = slct + npt + dlt

        $(formGroup).append(cln)
        $('.social-network-block').append(formGroup)
        $('.social-network-block .add-social-link').select2({
            theme: 'bootstrap',
        })
    })

    /*--------------------------------------------
    Select Category
    --------------------------------------------*/

    function selectFun() {
        $('.select-category').select2({
            theme: 'bootstrap',
        })

        $('.add-social-link').select2({
            theme: 'bootstrap',
        })

        $('.sort-by').select2({
            theme: 'bootstrap',
        })

        $('.nav-search-category').select2({
            theme: 'bootstrap',
        })
    }

    selectFun()

    /*----------------------------------------
      Price Range
    ---------------------------------------*/
    $('.nstSlider').nstSlider({
        left_grip_selector: '.leftGrip',
        value_changed_callback: function (cause, leftValue) {
            $(this).parent().find('.leftLabel').text(leftValue)
        },
    })

    /*--------------------------------------------
    Date Picker
    --------------------------------------------*/

    $('.datepicker-here').datepicker()

    /*--------------------------------------------
    Time Picker
    --------------------------------------------*/

    $('.ui-timepicker-input').timepicker()

    /*--------------------------------------------
    TinyMCE
    --------------------------------------------*/

    tinymce.init({
        selector: '.description-box',
        height: 120,
        menubar: false,
        theme: 'modern',
        mobile: {
            theme: 'mobile',
            plugins: ['autosave', 'lists', 'autolink'],
        },
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code',
        ],
        toolbar:
            'bold underline italic | bullist numlist | alignleft aligncenter alignright alignjustify | link',
    })

    /*-----------------------------------
    CountTo 
    -----------------------------------*/
    function animateCountTo(ct) {
        if ($.fn.visible && $(ct).visible() && !$(ct).hasClass('animated')) {
            $(ct).countTo({
                speed: 1000,
                refreshInterval: 1,
            })
            $(ct).addClass('animated')
        }
    }

    function initCountTo() {
        var counter = $('.count')
        counter.each(function () {
            animateCountTo(this)
        })
    }

    initCountTo()

    /*--------------------------------------------
    Person Control
    --------------------------------------------*/

    var personAmount = $('.person-amount').html()

    $('.control.plus').on('click', function () {
        personAmount++
        $('.person-amount').html(personAmount)
        $('.control.minus').css({
            cursor: 'pointer',
        })
    })

    $('.control.minus').on('click', function () {
        personAmount--
        $('.person-amount').html(personAmount)
        if (personAmount <= 0) {
            personAmount = 0
            $('.person-amount').html(personAmount)
            $('.control.minus').css({
                cursor: 'not-allowed',
            })
        }
    })

    /*--------------------------------------------
		Owl Carousel
		--------------------------------------------*/
    $('.header-category-slider-wrap').owlCarousel({
        loop: true,
        autoplay: false,
        dots: false,
        nav: true,
        navText: [
            '<i class="fas fa-angle-left"></i>',
            '<i class="fas fa-angle-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            },
            1200: {
                items: 5,
            },
        },
    })

    /*-------------------------------------
      Plyr Js  
    -------------------------------------*/

    const player = new Plyr('#video-player')

    /*-------------------------------------
    City Masonary
    -------------------------------------*/

    var $grid = $('.citys').isotope({
        itemSelector: '.city-item',
        masonry: {
            columnWidth: '.grid-sizer',
        },
    })

    $grid.imagesLoaded().progress(function () {
        $grid.isotope('layout')
    })

    /*-------------------------------------
    Slick Slider
    -------------------------------------*/

    $('.testimonial-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        autoplay: true,
        asNavFor: '.testimonial-nav',
    })

    $('.testimonial-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.testimonial-for',
        dots: false,
        autoplay: true,
        arrows: false,
        centerPadding: '0',
        centerMode: true,
        focusOnSelect: true,
    })

    $('.listing-slider').slick({
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        prevArrow: '<span class="ti-angle-left left"></span>',
        nextArrow: '<span class="ti-angle-right right"></span>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    centerMode: true,
                    centerPadding: '0',
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    centerMode: true,
                    centerPadding: '0',
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    centerMode: true,
                    centerPadding: '0',
                    slidesToShow: 1,
                },
            },
        ],
    })

    $('.page-header-slider').slick({
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        dots: true,
        prevArrow: '<span class="ti-angle-left left"></span>',
        nextArrow: '<span class="ti-angle-right right"></span>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    centerMode: true,
                    centerPadding: '0',
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    centerMode: true,
                    centerPadding: '0',
                    slidesToShow: 1,
                },
            },
        ],
    })

    $('.featured-cities').slick({
        centerMode: false,
        centerPadding: '0',
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow: '<span class="ti-angle-left left"></span>',
        nextArrow: '<span class="ti-angle-right right"></span>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    centerMode: true,
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    centerMode: false,
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 440,
                settings: {
                    centerMode: true,
                    slidesToShow: 1,
                },
            },
        ],
    })

    /*-----------------------------------
    Back to Top
    -----------------------------------*/
    $('.backtotop').on('click', function () {
        $('html, body').animate(
            {
                scrollTop: 0,
            },
            600
        )
        return false
    })

    /*-------------------------------------
    Window Scroll
    -------------------------------------*/
    $(window).on('scroll', function () {
        initCountTo()
    })

    $(window).on('resize orientationchange', function () {
        selectFun()
    })

    $("#listing_form").on('submit',function(e){
        e.preventDefault();
        var value = $( this ).serialize(),
        $this = $(this);
        $.ajax({
            type: 'POST',
            url: '/save_review',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data:value,
            success: function (response) {
                if(response.success){
                    $(".review-no-found").remove();
                    $this.trigger("reset");
                    $(".listing-review").append(response.payload);
                }else{
                    alert(response.message);
                }
            },
        })
    });

    $(".lisitng-favorite").on('click',function(e){
        e.preventDefault();
        var $this = $(this),
            listing_id = $this.data('listing-id');

        if(listing_id<1){
            alert("No Listing Found");
        }

        $.ajax({
            type: 'POST',
            url: '/save_favorite',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data:{
                'listing_id':listing_id
            },
            success: function (response) {
                alert(response.message);
            },
        })
    });

})
