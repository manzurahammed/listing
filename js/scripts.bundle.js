/**
 * @class mApp  Metronic App class
 */

var mApp = function() {

    /**
    * Initializes bootstrap tooltip
    */
    var initTooltip = function(el) {
        var skin = el.data('skin') ? 'm-tooltip--skin-' + el.data('skin') : '';
            
        el.tooltip({
            trigger: 'hover',
            template: '<div class="m-tooltip ' + skin + ' tooltip" role="tooltip">\
                <div class="arrow"></div>\
                <div class="tooltip-inner"></div>\
            </div>'
        });
    }
    
    /**
    * Initializes bootstrap tooltips
    */
    var initTooltips = function() {
        // init bootstrap tooltips
        $('[data-toggle="m-tooltip"]').each(function() {
            initTooltip($(this));
        });
    }

    /**
    * Initializes bootstrap popover
    */
    var initPopover = function(el) {
        var skin = el.data('skin') ? 'm-popover--skin-' + el.data('skin') : '';
            
        el.popover({
            trigger: 'hover',
            template: '\
            <div class="m-popover ' + skin + ' popover" role="tooltip">\
                <div class="arrow"></div>\
                <h3 class="popover-header"></h3>\
                <div class="popover-body"></div>\
            </div>'
        });
    }

    /**
    * Initializes bootstrap popovers
    */
    var initPopovers = function() {
        // init bootstrap popover
        $('[data-toggle="m-popover"]').each(function() {
            initPopover($(this));
        });
    }    

    /**
    * Initializes metronic portlet
    */
    var initPortlet = function(el, options) {
        // init portlet tools
        el.mPortlet(options);
    }

    /**
    * Initializes metronic portlets
    */
    var initPortlets = function() {
        // init portlet tools
        $('[data-portlet="true"]').each(function() {
            var el = $(this);

            if ( el.data('portlet-initialized') !== true ) {
                initPortlet(el, {});
                el.data('portlet-initialized', true);
            }
        });
    }

    /**
    * Initializes scrollable contents
    */
    var initScrollables = function() {
        $('[data-scrollable="true"]').each(function(){
            var maxHeight;
            var height;
            var el = $(this);

            if (mUtil.isInResponsiveRange('tablet-and-mobile')) {
                if (el.data('mobile-max-height')) {
                    maxHeight = el.data('mobile-max-height');
                } else {
                    maxHeight = el.data('max-height');
                }

                if (el.data('mobile-height')) {
                    height = el.data('mobile-height');
                } else {
                    height = el.data('height');
                }
            } else {
                maxHeight = el.data('max-height');
                height = el.data('max-height');
            }

            if (maxHeight) {
                el.css('max-height', maxHeight);
            }
            if (height) {
                el.css('height', height);
            }

            mApp.initScroller(el, {});
        });
    }

    /**
    * Initializes bootstrap alerts
    */
    var initAlerts = function() {
        // init bootstrap popover
        $('body').on('click', '[data-close=alert]', function() {
            $(this).closest('.alert').hide();
        });
    }        

    return {

        /**
        * Main class initializer
        */
        init: function() {
            mApp.initComponents();
        },

        /**
        * Initializes components
        */
        initComponents: function() {
            initScrollables();
            initTooltips();
            initPopovers();
            initAlerts();
            initPortlets();
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        initTooltips: function() {
            initTooltips();
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        initTooltip: function(el) {
            initTooltip(el);
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        initPopovers: function() {
            initPopovers();
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        initPopover: function(el) {
            initPopover(el);
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // function to init portlet
        initPortlet: function(el, options) {
            initPortlet(el, options);
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // function to init portlets
        initPortlets: function() {
            initPortlets();
        },

        /**
        * Scrolls to an element with animation
        * @param {object} el jQuery element object
        * @param {number} offset Offset to element scroll position
        */
        scrollTo: function(el, offset) {
            var pos = (el && el.length > 0) ? el.offset().top : 0;
            pos = pos + (offset ? offset : 0);

            jQuery('html,body').animate({
                scrollTop: pos
            }, 'slow');
        },

        /**
        * Scrolls until element is centered in the viewport 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        scrollToViewport: function(el) {
            var elOffset = el.offset().top;
            var elHeight = el.height();
            var windowHeight = mUtil.getViewPort().height;
            var offset = elOffset - ((windowHeight / 2) - (elHeight / 2));

            jQuery('html,body').animate({
                scrollTop: offset
            }, 'slow');
        },

        /**
        * Scrolls to the top of the page
        */
        // function to scroll to the top
        scrollTop: function() {
            mApp.scrollTo();
        },

        /**
        * Initializes scrollable content using mCustomScrollbar plugin
        * @param {object} el jQuery element object
        * @param {object} options mCustomScrollbar plugin options(refer: http://manos.malihu.gr/jquery-custom-content-scroller/)
        */
        initScroller: function(el, options) {
            if (mUtil.isMobileDevice()) {
                el.css('overflow', 'auto');
            } else {
                el.mCustomScrollbar("destroy");
                el.mCustomScrollbar({
                    scrollInertia: 0,
                    autoDraggerLength: true,
                    autoHideScrollbar: true,
                    autoExpandScrollbar: false,
                    alwaysShowScrollbar: 0,
                    axis: el.data('axis') ? el.data('axis') : 'y', 
                    mouseWheel: {
                        scrollAmount: 120,
                        preventDefault: true
                    },         
                    setHeight: (options.height ? options.height : ''),
                    theme:"minimal-dark"
                });
            }           
        },

        /**
        * Destroys scrollable content's mCustomScrollbar plugin instance
        * @param {object} el jQuery element object
        */
        destroyScroller: function(el) {
            el.mCustomScrollbar("destroy");
        },

        /**
        * Shows bootstrap alert
        * @param {object} options
        * @returns {string} ID attribute of the created alert
        */
        alert: function(options) {
            options = $.extend(true, {
                container: "", // alerts parent container(by default placed after the page breadcrumbs)
                place: "append", // "append" or "prepend" in container 
                type: 'success', // alert's type
                message: "", // alert's message
                close: true, // make alert closable
                reset: true, // close all previouse alerts first
                focus: true, // auto scroll to the alert after shown
                closeInSeconds: 0, // auto close after defined seconds
                icon: "" // put icon before the message
            }, options);

            var id = mUtil.getUniqueID("App_alert");

            var html = '<div id="' + id + '" class="custom-alerts alert alert-' + options.type + ' fade in">' + (options.close ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' : '') + (options.icon !== "" ? '<i class="fa-lg fa fa-' + options.icon + '"></i>  ' : '') + options.message + '</div>';

            if (options.reset) {
                $('.custom-alerts').remove();
            }

            if (!options.container) {
                if ($('.page-fixed-main-content').size() === 1) {
                    $('.page-fixed-main-content').prepend(html);
                } else if (($('body').hasClass("page-container-bg-solid") || $('body').hasClass("page-content-white")) && $('.page-head').size() === 0) {
                    $('.page-title').after(html);
                } else {
                    if ($('.page-bar').size() > 0) {
                        $('.page-bar').after(html);
                    } else {
                        $('.page-breadcrumb, .breadcrumbs').after(html);
                    }
                }
            } else {
                if (options.place == "append") {
                    $(options.container).append(html);
                } else {
                    $(options.container).prepend(html);
                }
            }

            if (options.focus) {
                mApp.scrollTo($('#' + id));
            }

            if (options.closeInSeconds > 0) {
                setTimeout(function() {
                    $('#' + id).remove();
                }, options.closeInSeconds * 1000);
            }

            return id;
        },

        /**
        * Blocks element with loading indiciator using http://malsup.com/jquery/block/
        * @param {object} target jQuery element object
        * @param {object} options 
        */
        block: function(target, options) {
            var el = $(target);

            options = $.extend(true, {
                opacity: 0.1,
                overlayColor: '',
                state: 'brand',
                type: 'spinner',
                centerX: true,
                centerY: true,
                message: '',
                shadow: true,
                width: 'auto'
            }, options);

            var skin;
            var state;
            var loading;

            if (options.type == 'spinner') {
                skin = options.skin ? 'm-spinner--skin-' + options.skin : '';
                state = options.state ? 'm-spinner--' + options.state : '';
                loading = '<div class="m-spinner ' + skin + ' ' + state + '"></div';
            } else {
                skin = options.skin ? 'm-loader--skin-' + options.skin : '';
                state = options.state ? 'm-loader--' + options.state : '';
                size = options.size ? 'm-loader--' + options.size : '';
                loading = '<div class="m-loader ' + skin + ' ' + state + ' ' + size + '"></div';
            }

            if (options.message && options.message.length > 0) {
                var classes = 'm-blockui ' + (options.shadow === false ? 'm-blockui-no-shadow' : '');

                html = '<div class="' + classes + '"><span>' + options.message + '</span><span>' + loading + '</span></div>';
                options.width = mUtil.realWidth(html) + 10;
                if (target == 'body') {
                    html = '<div class="' + classes + '" style="margin-left:-'+ (options.width / 2) +'px;"><span>' + options.message + '</span><span>' + loading + '</span></div>';
                }
            } else {
                html = loading;
            }

            var params = {
                message: html,
                centerY: options.centerY,
                centerX: options.centerX,
                css: {
                    top: '30%',
                    left: '50%',
                    border: '0',
                    padding: '0',
                    backgroundColor: 'none',
                    width: options.width
                },
                overlayCSS: {
                    backgroundColor: options.overlayColor,
                    opacity: options.opacity,
                    cursor: 'wait'
                },
                onUnblock: function() {
                    if (el) {
                        el.css('position', '');
                        el.css('zoom', '');
                    }                    
                }
            };

            if (target == 'body') {
                params.css.top = '50%';
                $.blockUI(params);
            } else {
                var el = $(target);
                el.block(params);
            }
        },

        /**
        * Un-blocks the blocked element 
        * @param {object} target jQuery element object
        */
        unblock: function(target) {
            if (target && target != 'body') {
                $(target).unblock();
            } else {
                $.unblockUI();
            }
        },

        /**
        * Blocks the page body element with loading indicator
        * @param {object} options 
        */
        blockPage: function(options) {
            return mApp.block('body', options);
        },

        /**
        * Un-blocks the blocked page body element
        */
        unblockPage: function() {
            return mApp.unblock('body');
        }
    };
}();

//== Initialize mApp class on document ready
$(document).ready(function() {
    mApp.init();
});
/**
 * @class mUtil  Metronic base utilize class that privides helper functions
 */

var mUtil = function() {
    var resizeHandlers = [];

    /** @type {object} breakpoints The device width breakpoints **/
    var breakpoints = {        
        sm: 544, // Small screen / phone           
        md: 768, // Medium screen / tablet            
        lg: 992, // Large screen / desktop        
        xl: 1200 // Extra large screen / wide desktop
    };

    /** @type {object} colors State colors **/
    var colors = {
        brand:      '#716aca',
        metal:      '#c4c5d6',
        light:      '#ffffff',
        accent:     '#00c5dc',
        primary:    '#5867dd',
        success:    '#34bfa3',
        info:       '#36a3f7',
        warning:    '#ffb822',
        danger:     '#f4516c'
    };

    /**
    * Handle window resize event with some 
    * delay to attach event handlers upon resize complete 
    */
    var _windowResizeHandler = function() {
        var resize;
        var _runResizeHandlers = function() {
            // reinitialize other subscribed elements
            for (var i = 0; i < resizeHandlers.length; i++) {
                var each = resizeHandlers[i];
                each.call();
            }
        };

        jQuery(window).resize(function() {
            if (resize) {
                clearTimeout(resize);
            }
            resize = setTimeout(function() {
                _runResizeHandlers();
            }, 250); // wait 50ms until window resize finishes.
        });
    };

    return {
        /**
        * Class main initializer.
        * @param {object} options.
        * @returns null
        */
        //main function to initiate the theme
        init: function(options) {
            if (options && options.breakpoints) {
                breakpoints = options.breakpoints;
            }

            if (options && options.colors) {
                colors = options.colors;
            }

            _windowResizeHandler();
        },

        /**
        * Adds window resize event handler.
        * @param {function} callback function.
        */
        addResizeHandler: function(callback) {
            resizeHandlers.push(callback);
        },

        /**
        * Trigger window resize handlers.
        */
        runResizeHandlers: function() {
            _runResizeHandlers();
        },        

        /**
        * Get GET parameter value from URL.
        * @param {string} paramName Parameter name.
        * @returns {string}  
        */
        getURLParam: function(paramName) {
            var searchString = window.location.search.substring(1),
                i, val, params = searchString.split("&");

            for (i = 0; i < params.length; i++) {
                val = params[i].split("=");
                if (val[0] == paramName) {
                    return unescape(val[1]);
                }
            }

            return null;
        },

        /**
        * Checks whether current device is mobile touch.
        * @returns {boolean}  
        */
        isMobileDevice: function() {
            return (this.getViewPort().width < this.getBreakpoint('lg') ? true : false);
        },

        /**
        * Checks whether current device is desktop.
        * @returns {boolean}  
        */
        isDesktopDevice: function() {
            return mUtil.isMobileDevice() ? false : true;
        },

        /**
        * Gets browser window viewport size. Ref: http://andylangton.co.uk/articles/javascript/get-viewport-size-javascript/
        * @returns {object}  
        */
        getViewPort: function() {
            var e = window,
                a = 'inner';
            if (!('innerWidth' in window)) {
                a = 'client';
                e = document.documentElement || document.body;
            }

            return {
                width: e[a + 'Width'],
                height: e[a + 'Height']
            };
        },

        /**
        * Checks whether given device mode is currently activated.
        * @param {string} mode Responsive mode name(e.g: desktop, desktop-and-tablet, tablet, tablet-and-mobile, mobile)
        * @returns {boolean}  
        */
        isInResponsiveRange: function(mode) {
            var breakpoint = this.getViewPort().width;

            if (mode == 'general') {
                return true;
            } else if (mode == 'desktop' && breakpoint >= (this.getBreakpoint('lg') + 1)) {
                return true;
            } else if (mode == 'tablet' && (breakpoint >= (this.getBreakpoint('md') + 1) && breakpoint < this.getBreakpoint('lg'))) {
                return true;
            } else if (mode == 'mobile' && breakpoint <= this.getBreakpoint('md')) {
                return true;
            } else if (mode == 'desktop-and-tablet' && breakpoint >= (this.getBreakpoint('md') + 1)) {
                return true;
            } else if (mode == 'tablet-and-mobile' && breakpoint <= this.getBreakpoint('lg')) {
                return true;
            }

            return false;
        },

        /**
        * Generates unique ID for give prefix.
        * @param {string} prefix Prefix for generated ID
        * @returns {boolean}  
        */
        getUniqueID: function(prefix) {
            return prefix + Math.floor(Math.random() * (new Date()).getTime());
        },

        /**
        * Gets window width for give breakpoint mode.
        * @param {string} mode Responsive mode name(e.g: xl, lg, md, sm)
        * @returns {number}  
        */
        getBreakpoint: function(mode) {
            if ($.inArray(mode, breakpoints)) {
                return breakpoints[mode];
            }
        },

        /**
        * Checks whether object has property matchs given key path.
        * @param {object} obj Object contains values paired with given key path
        * @param {string} keys Keys path seperated with dots
        * @returns {object}  
        */
        isset: function(obj, keys) {
            var stone;

            keys = keys || '';

            if (keys.indexOf('[') !== -1) {
                throw new Error('Unsupported object path notation.');
            }

            keys = keys.split('.');

            do {
                if (obj === undefined) {
                    return false;
                }

                stone = keys.shift();

                if (!obj.hasOwnProperty(stone)) {
                    return false;
                }

                obj = obj[stone];

            } while (keys.length);

            return true;
        },

        /**
        * Gets highest z-index of the given element parents
        * @param {object} el jQuery element object
        * @returns {number}  
        */
        getHighestZindex: function(el) {
            var elem = $(el),
                position, value;

            while (elem.length && elem[0] !== document) {
                // Ignore z-index if position is set to a value where z-index is ignored by the browser
                // This makes behavior of this function consistent across browsers
                // WebKit always returns auto if the element is positioned
                position = elem.css("position");

                if (position === "absolute" || position === "relative" || position === "fixed") {
                    // IE returns 0 when zIndex is not specified
                    // other browsers return a string
                    // we ignore the case of nested elements with an explicit value of 0
                    // <div style="z-index: -10;"><div style="z-index: 0;"></div></div>
                    value = parseInt(elem.css("zIndex"), 10);
                    if (!isNaN(value) && value !== 0) {
                        return value;
                    }
                }
                elem = elem.parent();
            }
        },

        /**
        * Checks whether the element has given classes
        * @param {object} el jQuery element object
        * @param {string} Classes string
        * @returns {boolean}  
        */
        hasClasses: function(el, classes) {
            var classesArr = classes.split(" ");

            for ( var i = 0; i < classesArr.length; i++ ) {
                if ( el.hasClass( classesArr[i] ) == false ) {
                    return false;
                }
            }                

            return true;
        },

        /**
        * Gets element actual/real width
        * @param {object} el jQuery element object
        * @returns {number}  
        */
        realWidth: function(el){
            var clone = $(el).clone();
            clone.css("visibility","hidden");
            clone.css('overflow', 'hidden');
            clone.css("height","0");
            $('body').append(clone);
            var width = clone.outerWidth();
            clone.remove();

            return width;
        },

        /**
        * Checks whether the element has any parent with fixed position
        * @param {object} el jQuery element object
        * @returns {boolean}  
        */
        hasFixedPositionedParent: function(el) {
            var result = false;
            
            el.parents().each(function () {
                if ($(this).css('position') == 'fixed') {
                    result = true;
                    return;
                }
            });

            return result;
        },

        /**
        * Simulates delay
        */
        sleep: function(milliseconds) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > milliseconds){
                    break;
                }
            }
        },

        /**
        * Gets randomly generated integer value within given min and max range
        * @param {number} min Range start value
        * @param {number} min Range end value
        * @returns {number}  
        */
        getRandomInt: function(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        },

        /**
        * Gets state color's hex code by color name
        * @param {string} name Color name
        * @returns {string}  
        */
        getColor: function(name) {
            return colors[name];
        },

        /**
        * Checks whether Angular library is included
        * @returns {boolean}  
        */
        isAngularVersion: function() {
            return window.Zone !== undefined  ? true : false;
        }
    }
}();

//== Initialize mUtil class on document ready
$(document).ready(function() {
    mUtil.init();
});
// jquery extension to add animation class into element
jQuery.fn.extend({
    animateClass: function(animationName, callback) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        jQuery(this).addClass('animated ' + animationName).one(animationEnd, function() {
            jQuery(this).removeClass('animated ' + animationName);
        });

        if (callback) {
            jQuery(this).one(animationEnd, callback);
        }
    },
    animateDelay: function(value) {
        var vendors = ['webkit-', 'moz-', 'ms-', 'o-', ''];
        for (var i = 0; i < vendors.length; i++) {
            jQuery(this).css(vendors[i] + 'animation-delay', value);
        }
    },
    animateDuration: function(value) {
        var vendors = ['webkit-', 'moz-', 'ms-', 'o-', ''];
        for (var i = 0; i < vendors.length; i++) {
            jQuery(this).css(vendors[i] + 'animation-duration', value);
        }
    }
});

(function ($) {
    // Plugin function
    $.fn.mDropdown = function (options) {
        // Plugin scope variable
        var dropdown = {};
        var element = $(this);

        // Plugin class
        var Plugin = {
            /**
             * Run
             */
            run: function (options) {
                if (!element.data('dropdown')) {                      
                    // create instance
                    Plugin.init(options);
                    Plugin.build();
                    Plugin.setup();
                    
                    // assign instance to the element                    
                    element.data('dropdown', dropdown);
                } else {
                    // get instance from the element
                    dropdown = element.data('dropdown');
                }               

                return dropdown;
            },

            /**
             * Initialize
             */
            init: function(options) {
                dropdown.events = [];
                dropdown.eventOne = false;
                dropdown.close = element.find('.m-dropdown__close');
                dropdown.toggle = element.find('.m-dropdown__toggle');
                dropdown.arrow = element.find('.m-dropdown__arrow');
                dropdown.wrapper = element.find('.m-dropdown__wrapper');
                dropdown.scrollable = element.find('.m-dropdown__scrollable');
                dropdown.defaultDropPos = element.hasClass('m-dropdown--up') ? 'up' : 'down';
                dropdown.currentDropPos = dropdown.defaultDropPos;

                dropdown.options = $.extend(true, {}, $.fn.mDropdown.defaults, options);
                if (element.data('drop-auto') === true) {
                    dropdown.options.dropAuto = true;
                } else if (element.data('drop-auto') === false) {
                    dropdown.options.dropAuto = false;
                }               

                if (dropdown.scrollable.length > 0) {
                    if (dropdown.scrollable.data('min-height')) {
                        dropdown.options.minHeight = dropdown.scrollable.data('min-height');
                    }

                    if (dropdown.scrollable.data('max-height')) {
                        dropdown.options.maxHeight = dropdown.scrollable.data('max-height');
                    }
                }                
            },

            /**
             * Build DOM and init event handlers
             */
            build: function () {
                if (mUtil.isMobileDevice()) {
                    if (element.data('dropdown-toggle') == 'hover' || element.data('dropdown-toggle') == 'click') { 
                        dropdown.options.toggle = 'click';
                    } else {
                        dropdown.options.toggle = 'click'; 
                        dropdown.toggle.click(Plugin.toggle); 
                    }
                } else {
                    if (element.data('dropdown-toggle') == 'hover') {     
                        dropdown.options.toggle = 'hover';              
                        element.mouseleave(Plugin.hide);
                    } else if(element.data('dropdown-toggle') == 'click') {
                        dropdown.options.toggle = 'click';                  
                    } else {
                        if (dropdown.options.toggle == 'hover') {
                            element.mouseenter(Plugin.show);
                            element.mouseleave(Plugin.hide);
                        } else {
                            dropdown.toggle.click(Plugin.toggle);      
                        }
                    }
                }                

                // handle dropdown close icon
                if (dropdown.close.length) {
                    dropdown.close.on('click', Plugin.hide);
                }

                // disable dropdown close
                Plugin.disableClose();
            }, 

            /**
             * Setup dropdown
             */
            setup: function () {
                if (dropdown.options.placement) {
                    element.addClass('m-dropdown--' + dropdown.options.placement);
                }

                if (dropdown.options.align) {
                    element.addClass('m-dropdown--align-' + dropdown.options.align);
                } 

                if (dropdown.options.width) {
                    dropdown.wrapper.css('width', dropdown.options.width);
                }

                if (element.data('dropdown-persistent')) {
                    dropdown.options.persistent = true;
                }
        
                // handle height
                if (dropdown.options.minHeight) {
                    dropdown.scrollable.css('min-height', dropdown.options.minHeight);                    
                } 

                if (dropdown.options.maxHeight) {
                    dropdown.scrollable.css('max-height', dropdown.options.maxHeight);     
                    dropdown.scrollable.css('overflow-y', 'auto'); 

                    if (mUtil.isDesktopDevice()) {
                        mApp.initScroller(dropdown.scrollable, {});                
                    }   
                }      

                // set zindex
                Plugin.setZindex();
            },

            /**
             * sync 
             */
            sync: function () {
                $(element).data('dropdown', dropdown);
            }, 

            /**
             * Sync dropdown object with jQuery element
             */
            disableClose: function () {
                element.on('click', '.m-dropdown--disable-close, .mCSB_1_scrollbar', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                });
            },

            /**
             * Toggle dropdown
             */
            toggle: function () {
                if (dropdown.open) {
                    return Plugin.hide();
                } else {
                    return Plugin.show();
                }
            },

            /**
             * Set content
             */
            setContent: function (content) {
                element.find('.m-dropdown__content').html(content);
                
                return dropdown;
            },

            /**
             * Show dropdown
             */
            show: function() {
                if (dropdown.options.toggle == 'hover' && element.data('hover')) {
                    Plugin.clearHovered(); 
                    return dropdown;
                }

                if (dropdown.open) {
                    return dropdown;
                }

                if (dropdown.arrow.length > 0) {
                    Plugin.adjustArrowPos();
                }

                Plugin.eventTrigger('beforeShow'); 

                Plugin.hideOpened();

                element.addClass('m-dropdown--open');

                if (mUtil.isMobileDevice() && dropdown.options.mobileOverlay) {
                    var zIndex = dropdown.wrapper.css('zIndex') - 1;
                    var dropdownoff = $('<div class="m-dropdown__dropoff"></div>');

                    dropdownoff.css('zIndex', zIndex);
                    dropdownoff.data('dropdown', element);
                    element.data('dropoff', dropdownoff);
                    element.after(dropdownoff);
                    dropdownoff.click(function(e) {
                        Plugin.hide();
                        $(this).remove();                    
                        e.preventDefault();
                    });
                } 

                element.focus();
                element.attr('aria-expanded', 'true');
                dropdown.open = true;

                Plugin.handleDropPosition();          

                Plugin.eventTrigger('afterShow');

                return dropdown;
            },

            /**
             * Clear dropdown hover
             */
            clearHovered: function () {
                element.removeData('hover');
                var timeout = element.data('timeout');
                element.removeData('timeout');
                clearTimeout(timeout);
            },

            /**
             * Hide hovered dropdown
             */
            hideHovered: function(force) {
                if (force) {
                    if (Plugin.eventTrigger('beforeHide') === false) {
                        // cancel hide
                        return;
                    }  

                    Plugin.clearHovered();        
                    element.removeClass('m-dropdown--open');
                    dropdown.open = false;
                    Plugin.eventTrigger('afterHide');
                } else {
                    if (Plugin.eventTrigger('beforeHide') === false) {
                        // cancel hide
                        return;
                    }
                    var timeout = setTimeout(function() {
                        if (element.data('hover')) {
                            Plugin.clearHovered();        
                            element.removeClass('m-dropdown--open');
                            dropdown.open = false;
                            Plugin.eventTrigger('afterHide');
                        }
                    }, dropdown.options.hoverTimeout);

                    element.data('hover', true);
                    element.data('timeout', timeout); 
                }     
            },

            /**
             * Hide clicked dropdown
             */
            hideClicked: function() {    
                if (Plugin.eventTrigger('beforeHide') === false) {
                    // cancel hide
                    return;
                }             
                element.removeClass('m-dropdown--open');
                if (element.data('dropoff')) {
                    element.data('dropoff').remove();
                }
                dropdown.open = false;
                Plugin.eventTrigger('afterHide');
            },

            /**
             * Hide dropdown
             */
            hide: function(force) {
                if (dropdown.open === false) {
                    return dropdown;
                }

                if (dropdown.options.toggle == 'hover') {
                    Plugin.hideHovered(force);
                } else {
                    Plugin.hideClicked();
                }

                if (dropdown.defaultDropPos == 'down' && dropdown.currentDropPos == 'up') {
                    element.removeClass('m-dropdown--up');
                    dropdown.arrow.prependTo(dropdown.wrapper);
                    dropdown.currentDropPos = 'down';
                }

                return dropdown;                
            },

            /**
             * Hide opened dropdowns
             */
            hideOpened: function() {
                $('.m-dropdown.m-dropdown--open').each(function() {
                    $(this).mDropdown().hide(true);
                });
            },

            /**
             * Adjust dropdown arrow positions
             */
            adjustArrowPos: function() {
                var width = element.outerWidth();
                var alignment = dropdown.arrow.hasClass('m-dropdown__arrow--right') ? 'right' : 'left';
                var pos = 0;

                if (dropdown.arrow.length > 0) {
                    if (mUtil.isInResponsiveRange('mobile') && element.hasClass('m-dropdown--mobile-full-width')) {
                        pos = element.offset().left + (width / 2) - Math.abs(dropdown.arrow.width() / 2) - parseInt(dropdown.wrapper.css('left'));
                        dropdown.arrow.css('right', 'auto');    
                        dropdown.arrow.css('left', pos);    
                        dropdown.arrow.css('margin-left', 'auto');
                        dropdown.arrow.css('margin-right', 'auto');
                    } else if (dropdown.arrow.hasClass('m-dropdown__arrow--adjust')) {
                        pos = width / 2 - Math.abs(dropdown.arrow.width() / 2);
                        if (element.hasClass('m-dropdown--align-push')) {
                            pos = pos + 20;
                        }
                        if (alignment == 'right') { 
                            dropdown.arrow.css('left', 'auto');  
                            dropdown.arrow.css('right', pos);
                        } else {                            
                            dropdown.arrow.css('right', 'auto');  
                            dropdown.arrow.css('left', pos);
                        }  
                    }                    
                }
            },

            /**
             * Change dropdown drop position
             */
            handleDropPosition: function() {
                return;
                
                if (dropdown.options.dropAuto == true) {
                    if (Plugin.isInVerticalViewport() === false) {
                        if (dropdown.currentDropPos == 'up') {
                            element.removeClass('m-dropdown--up');
                            dropdown.arrow.prependTo(dropdown.wrapper);
                            dropdown.currentDropPos = 'down';
                        } else if (dropdown.currentDropPos == 'down') {
                            element.addClass('m-dropdown--up');
                            dropdown.arrow.appendTo(dropdown.wrapper);
                            dropdown.currentDropPos = 'up'; 
                        }
                    }
                }
            },

            /**
             * Get zindex
             */
            setZindex: function() {
                var oldZindex = dropdown.wrapper.css('z-index');
                var newZindex = mUtil.getHighestZindex(element);
                if (newZindex > oldZindex) {
                    dropdown.wrapper.css('z-index', zindex);
                }
            },

            /**
             * Check persistent
             */
            isPersistent: function () {
                return dropdown.options.persistent;
            },

            /**
             * Check persistent
             */
            isShown: function () {
                return dropdown.open;
            },

            /**
             * Check if dropdown is in viewport
             */
            isInVerticalViewport: function() {
                var el = dropdown.wrapper;
                var offset = el.offset();
                var height = el.outerHeight();
                var width = el.width();
                var scrollable = el.find('[data-scrollable]');

                if (scrollable.length) {
                    if (scrollable.data('max-height')) {
                        height += parseInt(scrollable.data('max-height'));
                    } else if(scrollable.data('height')) {
                        height += parseInt(scrollable.data('height'));
                    }
                }

                return (offset.top + height < $(window).scrollTop() + $(window).height());
            },

            /**
             * Trigger events
             */
            eventTrigger: function(name) {
                for (i = 0; i < dropdown.events.length; i++) {
                    var event = dropdown.events[i];
                    if (event.name == name) {
                        if (event.one == true) {
                            if (event.fired == false) {
                                dropdown.events[i].fired = true;
                                return event.handler.call(this, dropdown);
                            }
                        } else {
                            return  event.handler.call(this, dropdown);
                        }
                    }
                }
            },

            addEvent: function(name, handler, one) {
                dropdown.events.push({
                    name: name,
                    handler: handler,
                    one: one,
                    fired: false
                });

                Plugin.sync();

                return dropdown;
            }
        };

        // Run plugin
        Plugin.run.apply(this, [options]);

        //////////////////////
        // ** Public API ** //
        //////////////////////
       
        /**
         * Show dropdown
         * @returns {mDropdown}
         */
        dropdown.show = function () {
            return Plugin.show();
        };

        /**
         * Hide dropdown
         * @returns {mDropdown}
         */
        dropdown.hide = function () {
            return Plugin.hide();
        };

        /**
         * Toggle dropdown
         * @returns {mDropdown}
         */
        dropdown.toggle = function () {
            return Plugin.toggle();
        };

        /**
         * Toggle dropdown
         * @returns {mDropdown}
         */
        dropdown.isPersistent = function () {
            return Plugin.isPersistent();
        };

        /**
         * Check shown state
         * @returns {mDropdown}
         */
        dropdown.isShown = function () {
            return Plugin.isShown();
        };

        /**
         * Check shown state
         * @returns {mDropdown}
         */
        dropdown.fixDropPosition = function () {
            return Plugin.handleDropPosition();
        };

        /**
         * Set dropdown content
         * @returns {mDropdown}
         */
        dropdown.setContent = function (content) {
            return Plugin.setContent(content);
        };

        /**
         * Set dropdown content
         * @returns {mDropdown}
         */
        dropdown.on =  function (name, handler) {
            return Plugin.addEvent(name, handler);
        };

        /**
         * Set dropdown content
         * @returns {mDropdown}
         */
        dropdown.one =  function (name, handler) {
            return Plugin.addEvent(name, handler, true);
        };        

        return dropdown;
    };

    // default options
    $.fn.mDropdown.defaults = {
        toggle: 'click',
        hoverTimeout: 300,
        skin: 'default',
        height: 'auto',
        dropAuto: true,
        maxHeight: false,
        minHeight: false,
        persistent: false,
        mobileOverlay: true
    };

    // global init
    if (mUtil.isMobileDevice()) {
        $(document).on('click', '[data-dropdown-toggle="click"] .m-dropdown__toggle, [data-dropdown-toggle="hover"] .m-dropdown__toggle', function(e) { 
            e.preventDefault(); 
            $(this).parent('.m-dropdown').mDropdown().toggle(); 
        });
    } else {
        $(document).on('click', '[data-dropdown-toggle="click"] .m-dropdown__toggle', function(e) { 
            e.preventDefault();
            $(this).parent('.m-dropdown').mDropdown().toggle();   
        });
        $(document).on('mouseenter', '[data-dropdown-toggle="hover"]', function(e) { 
            $(this).mDropdown().toggle();
        });
    }

    // handle global document click
    $(document).on('click', function(e) {
        $('.m-dropdown.m-dropdown--open').each(function() {
            if (!$(this).data('dropdown')) {
                return;
            }        
            
            var target = $(e.target);
            var dropdown = $(this).mDropdown();
            var toggle = $(this).find('.m-dropdown__toggle');

            if (toggle.length > 0 && target.is(toggle) !== true && toggle.find(target).length === 0 && target.find(toggle).length === 0 && dropdown.isPersistent() == false) {
                dropdown.hide();     
            } else if ($(this).find(target).length === 0) {
                dropdown.hide();       
            }
        });
    });
}(jQuery));

(function($) {

    // Plugin function
    $.fn.mHeader = function(options) {
        // Plugin scope variable
        var header = this;
        var element = $(this);

        // Plugin class
        var Plugin = {
            /**
             * Run plugin
             * @returns {mHeader}
             */
            run: function(options) { 
                if (element.data('header')) {
                    header = element.data('header');                
                } else {
                    // reset header
                    Plugin.init(options);

                    // reset header
                    Plugin.reset();

                    // build header
                    Plugin.build();

                    element.data('header', header);
                } 

                return header;
            },

            /**
             * Handles subheader click toggle
             * @returns {mHeader}
             */
            init: function(options) {                
                header.options = $.extend(true, {}, $.fn.mHeader.defaults, options);
            },

            /**
             * Reset header
             * @returns {mHeader}
             */
            build: function() {
                Plugin.toggle();                   
            },

            toggle: function() {
                var lastScrollTop = 0;

                if (header.options.minimize.mobile === false && header.options.minimize.desktop === false) {
                    return;
                }          

                $(window).scroll(function() {
                    var offset = 0;

                    if (mUtil.isInResponsiveRange('desktop')) {
                        offset = header.options.offset.desktop;
                        on = header.options.minimize.desktop.on;
                        off = header.options.minimize.desktop.off;
                    } else if (mUtil.isInResponsiveRange('tablet-and-mobile')) {
                        offset = header.options.offset.mobile;
                        on = header.options.minimize.mobile.on;
                        off = header.options.minimize.mobile.off;
                    }

                    var st = $(this).scrollTop();

                    if (header.options.classic) {
                        if (st > offset){ // down scroll mode
                            $("body").addClass(on);
                            $("body").removeClass(off);
                        } else { // back scroll mode
                            $("body").addClass(off);
                            $("body").removeClass(on);
                        }
                    } else {
                        if (st > offset && lastScrollTop < st){ // down scroll mode
                            $("body").addClass(on);
                            $("body").removeClass(off);
                        } else { // back scroll mode
                            $("body").addClass(off);
                            $("body").removeClass(on);
                        }
                        
                        lastScrollTop = st;
                    }
                });
            },

            /**
             * Reset menu
             * @returns {mMenu}
             */
            reset: function() {
            }
        };

        // Run plugin
        Plugin.run.apply(header, [options]);

        //////////////////////
        // ** Public API ** //
        //////////////////////

        /**
         * Disable header for given time
         * @returns {jQuery}
         */
        header.publicMethod = function() {
        	//return Plugin.publicMethod();
        };

        // Return plugin instance
        return header;
    };

    // Plugin default options
    $.fn.mHeader.defaults = {
        classic: false,
        offset: {
            mobile: 150,
            desktop: 200        
        },
        minimize: {
            mobile: false,
            desktop: false
        }
    }; 
}(jQuery));
(function($) {

    // Plugin function
    $.fn.mMenu = function(options) {
        // Plugin scope variable
        var menu = this;
        var element = $(this);

        // Plugin class
        var Plugin = {
            /**
             * Run plugin
             * @returns {mMenu}
             */
            run: function(options, reinit) { 
                if (element.data('menu') && reinit !== true) {
                    menu = element.data('menu');                
                } else {
                    // reset menu
                    Plugin.init(options);

                    // reset menu
                    Plugin.reset();

                    // build menu
                    Plugin.build();

                    element.data('menu', menu);
                } 

                return menu;
            },

            /**
             * Handles submenu click toggle
             * @returns {mMenu}
             */
            init: function(options) { 
                menu.events = [];

                // merge default and user defined options
                menu.options = $.extend(true, {}, $.fn.mMenu.defaults, options);

                // pause menu
                menu.pauseDropdownHoverTime = 0;
            },

            /**
             * Reset menu
             * @returns {mMenu}
             */
            build: function() {
                element.on('click', '.m-menu__toggle', Plugin.handleSubmenuAccordion);
                

                // dropdown mode(hoverable)
                if (Plugin.getSubmenuMode() === 'dropdown' || Plugin.isConditionalSubmenuDropdown()) {   
                	// dropdown submenu - hover toggle
	                element.on({mouseenter: Plugin.handleSubmenuDrodownHoverEnter, mouseleave: Plugin.handleSubmenuDrodownHoverExit}, '[data-menu-submenu-toggle="hover"]');

	                // dropdown submenu - click toggle
	                element.on('click', '[data-menu-submenu-toggle="click"] .m-menu__toggle', Plugin.handleSubmenuDropdownClick);
                }

                element.find('.m-menu__item:not(.m-menu__item--submenu) > .m-menu__link:not(.m-menu__toggle)').click(Plugin.handleLinkClick);             
            },

            /**
             * Reset menu
             * @returns {mMenu}
             */
            reset: function() {
            	// remove accordion handler
            	element.off('click', '.m-menu__toggle', Plugin.handleSubmenuAccordion);

            	// remove dropdown handlers
            	element.off({mouseenter: Plugin.handleSubmenuDrodownHoverEnter, mouseleave: Plugin.handleSubmenuDrodownHoverExit}, '[data-menu-submenu-toggle="hover"]');
            	element.off('click', '[data-menu-submenu-toggle="click"] .m-menu__toggle', Plugin.handleSubmenuDropdownClick);

                // reset mobile menu attributes
                menu.find('.m-menu__submenu, .m-menu__inner').css('display', '');
                menu.find('.m-menu__item--hover').removeClass('m-menu__item--hover');
                menu.find('.m-menu__item--open:not(.m-menu__item--expanded)').removeClass('m-menu__item--open');
            },

            /**
            * Get submenu mode for current breakpoint and menu state
            * @returns {mMenu}
            */
            getSubmenuMode: function() {                
                if (mUtil.isInResponsiveRange('desktop')) {
                    if (mUtil.isset(menu.options.submenu, 'desktop.state.body')) {
                        if ($('body').hasClass(menu.options.submenu.desktop.state.body)) {
                            return menu.options.submenu.desktop.state.mode;
                        } else {
                            return menu.options.submenu.desktop.default;
                        }
                    } else if (mUtil.isset(menu.options.submenu, 'desktop') ){
                        return menu.options.submenu.desktop;
                    }
                } else if (mUtil.isInResponsiveRange('tablet') && mUtil.isset(menu.options.submenu, 'tablet')) {
                    return menu.options.submenu.tablet;
                } else if (mUtil.isInResponsiveRange('mobile') && mUtil.isset(menu.options.submenu, 'mobile')) {
                    return menu.options.submenu.mobile;
                } else {
                    return false;
                }
            },

            /**
            * Get submenu mode for current breakpoint and menu state
            * @returns {mMenu}
            */
            isConditionalSubmenuDropdown: function() {
                if (mUtil.isInResponsiveRange('desktop') && mUtil.isset(menu.options.submenu, 'desktop.state.body')) {
                    return true;
                } else {
                    return false;    
                }                
            },

            /**
             * Handles menu link click
             * @returns {mMenu}
             */
            handleLinkClick: function(e) {    

                if (Plugin.eventTrigger('linkClick', $(this)) === false) {
                    e.preventDefault();
                };

                if (Plugin.getSubmenuMode() === 'dropdown' || Plugin.isConditionalSubmenuDropdown()) { 
                    Plugin.handleSubmenuDropdownClose(e, $(this));
                }
            },

            /**
             * Handles submenu hover toggle
             * @returns {mMenu}
             */
            handleSubmenuDrodownHoverEnter: function(e) {
                if (Plugin.getSubmenuMode() === 'accordion') {
                    return;
                }

                if (menu.resumeDropdownHover() === false) {
                    return;
                }               

                var item = $(this);

                Plugin.showSubmenuDropdown(item);

                if (item.data('hover') == true) {
                    Plugin.hideSubmenuDropdown(item, false);
                }
            },

            /**
             * Handles submenu hover toggle
             * @returns {mMenu}
             */
            handleSubmenuDrodownHoverExit: function(e) {
                if (menu.resumeDropdownHover() === false) {
                    return;
                }

                if (Plugin.getSubmenuMode() === 'accordion') {
                    return;
                }

                var item = $(this);
                var time = menu.options.dropdown.timeout;

                var timeout = setTimeout(function() {
                    if (item.data('hover') == true) {
                        Plugin.hideSubmenuDropdown(item, true);
                    }
                }, time);

                item.data('hover', true);
                item.data('timeout', timeout);
            },

            /**
             * Handles submenu click toggle
             * @returns {mMenu}
             */
            handleSubmenuDropdownClick: function(e) {
                if (Plugin.getSubmenuMode() === 'accordion') {
                    return;
                }

                var item = $(this).closest('.m-menu__item');

                if (item.hasClass('m-menu__item--hover') == false) {
                    item.addClass('m-menu__item--open-dropdown');
                    Plugin.showSubmenuDropdown(item);
                    //if (mUtil.isMobileDevice()) {
                        //Plugin.createSubmenuDropdownClickDropoff(item);
                    //}
                } else {
                    item.removeClass('m-menu__item--open-dropdown');
                    Plugin.hideSubmenuDropdown(item, true);
                }

                e.preventDefault();
            },

            /**
             * Handles submenu dropdown close on link click
             * @returns {mMenu}
             */
            handleSubmenuDropdownClose: function(e, el) {
                // exit if its not submenu dropdown mode
                if (Plugin.getSubmenuMode() === 'accordion') {
                    return;
                }

                var shown = element.find('.m-menu__item.m-menu__item--submenu.m-menu__item--hover');

                // check if currently clicked link's parent item ha
                if (shown.length > 0 && el.hasClass('m-menu__toggle') === false && el.find('.m-menu__toggle').length === 0) {
                    // close opened dropdown menus
                    shown.each(function() {
                        Plugin.hideSubmenuDropdown($(this), true);    
                    });                     
                }
            },

            /**
             * helper functions
             * @returns {mMenu}
             */
            handleSubmenuAccordion: function(e) {
                if (Plugin.getSubmenuMode() === 'dropdown') {
                    e.preventDefault();
                    return;
                }

                var item = $(this);

                var li = item.closest('li');
                var submenu = li.children('.m-menu__submenu, .m-menu__inner');

                if (submenu.parent('.m-menu__item--expanded').length != 0) {
                    //return;
                }

                if (submenu.length > 0) {
                    e.preventDefault();
                    var speed = menu.options.accordion.slideSpeed;
                    var hasClosables = false;

                    if (li.hasClass('m-menu__item--open') === false) {
                        // hide other accordions
                        if (menu.options.accordion.expandAll === false) {
                            var closables = item.closest('.m-menu__nav, .m-menu__subnav').find('> .m-menu__item.m-menu__item--open.m-menu__item--submenu:not(.m-menu__item--expanded)');
                            closables.each(function() {
                                $(this).children('.m-menu__submenu').slideUp(speed, function() {
                                    Plugin.scrollToItem(item);
                                });                                
                                $(this).removeClass('m-menu__item--open');
                            });

                            if (closables.length > 0) {
                                hasClosables = true;
                            }
                        }                         

                        if (hasClosables) {
                            submenu.slideDown(speed, function() {
                                Plugin.scrollToItem(item);
                            }); 
                            li.addClass('m-menu__item--open');

                            //setTimeout(function() {
                                
                            //}, speed);
                        } else {
                            submenu.slideDown(speed, function() {
                                Plugin.scrollToItem(item);
                            });
                            li.addClass('m-menu__item--open');
                        }                        
                    } else {  
                        submenu.slideUp(speed, function() {
                             Plugin.scrollToItem(item);
                        });                        
                        li.removeClass('m-menu__item--open');                  
                    }
                }
            },     

            /**
             * scroll to item function
             * @returns {mMenu}
             */
            scrollToItem: function(item) {
                // handle auto scroll for accordion submenus
                if (mUtil.isInResponsiveRange('desktop') && menu.options.accordion.autoScroll && !element.data('menu-scrollable')) {                        
                    mApp.scrollToViewport(item);
                }
            },

            /**
             * helper functions
             * @returns {mMenu}
             */
            hideSubmenuDropdown: function(el, classAlso) {
                // remove submenu activation class
                if (classAlso) {
                    el.removeClass('m-menu__item--hover');
                }
                // clear timeout
                el.removeData('hover');
                var timeout = el.data('timeout');
                el.removeData('timeout');
                clearTimeout(timeout);
            },

            /**
             * helper functions
             * @returns {mMenu}
             */
            showSubmenuDropdown: function(item) {
                // close active submenus
                element.find('.m-menu__item--submenu.m-menu__item--hover').each(function() {
                    var el = $(this);
                    if (item.is(el) || el.find(item).length > 0 || item.find(el).length > 0) {
                        return;
                    } else {
                        Plugin.hideSubmenuDropdown(el, true); 
                    }
                });

                // adjust submenu position
                Plugin.adjustSubmenuDropdownArrowPos(item);
                
                // add submenu activation class
                item.addClass('m-menu__item--hover');

                // handle auto scroll for accordion submenus
                if (Plugin.getSubmenuMode() === 'accordion' && menu.options.accordion.autoScroll) {
                    mApp.scrollTo(item.children('.m-menu__item--submenu'));
                }              
            },                

            /**
             * Handles submenu click toggle
             * @returns {mMenu}
             */
            resize: function(e) {
                if (Plugin.getSubmenuMode() !== 'dropdown') {
                    return;
                }

                var resize = element.find('> .m-menu__nav > .m-menu__item--resize');
                var submenu = resize.find('> .m-menu__submenu');
                var breakpoint;
                var currentWidth = mUtil.getViewPort().width;
                var itemsNumber = element.find('> .m-menu__nav > .m-menu__item').length - 1;
                var check;

                if (
                    Plugin.getSubmenuMode() == 'dropdown' && 
                    (
                        (mUtil.isInResponsiveRange('desktop') && mUtil.isset(menu.options, 'resize.desktop') && (check = menu.options.resize.desktop) && currentWidth <= (breakpoint = resize.data('menu-resize-desktop-breakpoint'))) ||
                        (mUtil.isInResponsiveRange('tablet') && mUtil.isset(menu.options, 'resize.tablet') && (check = menu.options.resize.tablet) && currentWidth <= (breakpoint = resize.data('menu-resize-tablet-breakpoint'))) ||
                        (mUtil.isInResponsiveRange('mobile') && mUtil.isset(menu.options, 'resize.mobile') && (check = menu.options.resize.mobile) && currentWidth <= (breakpoint = resize.data('menu-resize-mobile-breakpoint')))
                    )
                    ) {
                 
                    var moved = submenu.find('> .m-menu__subnav > .m-menu__item').length; // currently move
                    var left = element.find('> .m-menu__nav > .m-menu__item:not(.m-menu__item--resize)').length; // currently left
                    var total = moved + left;

                    if (check.apply() === true) {
                        // return
                        if (moved > 0) {
                            submenu.find('> .m-menu__subnav > .m-menu__item').each(function() {
                                var item = $(this);

                                var elementsNumber = submenu.find('> .m-menu__nav > .m-menu__item:not(.m-menu__item--resize)').length;
                                element.find('> .m-menu__nav > .m-menu__item:not(.m-menu__item--resize)').eq(elementsNumber - 1).after(item);

                                if (check.apply() === false) {
                                    item.appendTo(submenu.find('> .m-menu__subnav'));
                                    return false;
                                }         

                                moved--;
                                left++;                        
                            });
                        }
                    } else {
                        // move
                        if (left > 0) {
                            var items = element.find('> .m-menu__nav > .m-menu__item:not(.m-menu__item--resize)');
                            var index = items.length - 1;
                                
                            for(var i = 0; i < items.length; i++) {
                                var item = $(items.get(index)); 
                                index--;

                                if (check.apply() === true) {
                                    break;
                                }

                                item.appendTo(submenu.find('> .m-menu__subnav'));

                                moved++;
                                left--; 
                            } 
                        }
                    }

                    if (moved > 0) {
                        resize.show();  
                    } else {
                        resize.hide();
                    }                   
                } else {    
                    submenu.find('> .m-menu__subnav > .m-menu__item').each(function() {
                        var elementsNumber = submenu.find('> .m-menu__subnav > .m-menu__item').length;
                        element.find('> .m-menu__nav > .m-menu__item').get(elementsNumber).after($(this));
                    });

                    resize.hide();
                }
            },

            /**
             * Handles submenu slide toggle
             * @returns {mMenu}
             */
            createSubmenuDropdownClickDropoff: function(el) {
                var zIndex = el.find('> .m-menu__submenu').css('zIndex') - 1;
                var dropoff = $('<div class="m-menu__dropoff" style="background: transparent; position: fixed; top: 0; bottom: 0; left: 0; right: 0; z-index: ' + zIndex + '"></div>');
                $('body').after(dropoff);
                dropoff.on('click', function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    el.removeClass('m-menu__item--hover');
                    $(this).remove();
                });
            },

            /**
             * Handles submenu click toggle
             * @returns {mMenu}
             */
            adjustSubmenuDropdownArrowPos: function(item) {                
                var arrow = item.find('> .m-menu__submenu > .m-menu__arrow.m-menu__arrow--adjust');
                var submenu = item.find('> .m-menu__submenu');
                var subnav = item.find('> .m-menu__submenu > .m-menu__subnav');
                
                if (arrow.length > 0) {
                    var pos;
                    var link = item.children('.m-menu__link');

                    if (submenu.hasClass('m-menu__submenu--classic') || submenu.hasClass('m-menu__submenu--fixed')) { 
                        if (submenu.hasClass('m-menu__submenu--right')) {
                            pos = item.outerWidth() / 2;
                            if (submenu.hasClass('m-menu__submenu--pull')) {
                                pos = pos + Math.abs(parseInt(submenu.css('margin-right')));    
                            }  
                            pos = submenu.width() - pos;
                        } else if (submenu.hasClass('m-menu__submenu--left')) {
                            pos = item.outerWidth() / 2;
                            if (submenu.hasClass('m-menu__submenu--pull')) {
                                pos = pos + Math.abs(parseInt(submenu.css('margin-left')));    
                            } 
                        }
                    } else  {
                        if (submenu.hasClass('m-menu__submenu--center') || submenu.hasClass('m-menu__submenu--full')) {
                            pos = item.offset().left - ((mUtil.getViewPort().width - submenu.outerWidth()) / 2);
                            pos = pos + (item.outerWidth() / 2);
                        } else if (submenu.hasClass('m-menu__submenu--left')) {
                            // to do
                        } else if (submenu.hasClass('m-menu__submenu--right')) {
                            // to do
                        }
                    } 

                    arrow.css('left', pos);
                }
            },

            /**
             * Handles submenu hover toggle
             * @returns {mMenu}
             */
            pauseDropdownHover: function(time) {
            	var date = new Date();

            	menu.pauseDropdownHoverTime = date.getTime() + time;
            },

            /**
             * Handles submenu hover toggle
             * @returns {mMenu}
             */
            resumeDropdownHover: function() {
            	var date = new Date();

            	return (date.getTime() > menu.pauseDropdownHoverTime ? true : false);
            },

            /**
             * Reset menu's current active item
             * @returns {mMenu}
             */
            resetActiveItem: function(item) {
                element.find('.m-menu__item--active').each(function() {
                    $(this).removeClass('m-menu__item--active');
                    $(this).children('.m-menu__submenu').css('display', '');

                    $(this).parents('.m-menu__item--submenu').each(function() {
                        $(this).removeClass('m-menu__item--open');
                        $(this).children('.m-menu__submenu').css('display', '');
                    });
                });             

                // close open submenus
                if (menu.options.accordion.expandAll === false) {
                    element.find('.m-menu__item--open').each(function() {
                        $(this).removeClass('m-menu__item--open');
                    });
                }
            },

            /**
             * Sets menu's active item
             * @returns {mMenu}
             */
            setActiveItem: function(item) {
                // reset current active item
                Plugin.resetActiveItem();

                var item = $(item);
                item.addClass('m-menu__item--active');
                item.parents('.m-menu__item--submenu').each(function() {
                    $(this).addClass('m-menu__item--open');
                });
            },

            /**
             * Returns page breadcrumbs for the menu's active item
             * @returns {mMenu}
             */
            getBreadcrumbs: function(item) {
                var breadcrumbs = [];
                var item = $(item);
                var link = item.children('.m-menu__link');

                breadcrumbs.push({
                    text: link.find('.m-menu__link-text').html(), 
                    title: link.attr('title'),
                    href: link.attr('href')
                });

                item.parents('.m-menu__item--submenu').each(function() {
                    var submenuLink = $(this).children('.m-menu__link');
                    breadcrumbs.push({
                        text: submenuLink.find('.m-menu__link-text').html(), 
                        title: submenuLink.attr('title'),
                        href: submenuLink.attr('href')
                    });
                });

                breadcrumbs.reverse();

                return breadcrumbs;
            },

            /**
             * Returns page title for the menu's active item
             * @returns {mMenu}
             */
            getPageTitle: function(item) {
                item = $(item);       

                return item.children('.m-menu__link').find('.m-menu__link-text').html();
            },

            /**
             * Sync 
             */
            sync: function () {
                $(element).data('menu', menu);
            }, 

            /**
             * Trigger events
             */
            eventTrigger: function(name, args) {
                for (i = 0; i < menu.events.length; i++) {
                    var event = menu.events[i];
                    if (event.name == name) {
                        if (event.one == true) {
                            if (event.fired == false) {
                                menu.events[i].fired = true;
                                return event.handler.call(this, menu, args);
                            }
                        } else {
                            return  event.handler.call(this, menu, args);
                        }
                    }
                }
            },

            addEvent: function(name, handler, one) {
                menu.events.push({
                    name: name,
                    handler: handler,
                    one: one,
                    fired: false
                });

                Plugin.sync();
            }
        };

        // Run plugin
        Plugin.run.apply(menu, [options]);

        // Handle plugin on window resize
        if (typeof(options)  !== "undefined") {
            $(window).resize(function() {
                Plugin.run.apply(menu, [options, true]);
            });  
        }        

        //////////////////////
        // ** Public API ** //
        //////////////////////

        /**
         * Set active menu item
         */
        menu.setActiveItem = function(item) {
            return Plugin.setActiveItem(item);
        };

        /**
         * Set breadcrumb for menu item
         */
        menu.getBreadcrumbs = function(item) {
            return Plugin.getBreadcrumbs(item);
        };

        /**
         * Set page title for menu item
         */
        menu.getPageTitle = function(item) {
            return Plugin.getPageTitle(item);
        };

        /**
         * Get submenu mode
         */
        menu.getSubmenuMode = function() {
            return Plugin.getSubmenuMode();
        };

        /**
         * Disable menu for given time
         * @returns {jQuery}
         */
        menu.pauseDropdownHover = function(time) {
        	Plugin.pauseDropdownHover(time);
        };

        /**
         * Disable menu for given time
         * @returns {jQuery}
         */
        menu.resumeDropdownHover = function() {
        	return Plugin.resumeDropdownHover();
        };

        /**
         * Register event
         */
        menu.on =  function (name, handler) {
            return Plugin.addEvent(name, handler);
        };

        // Return plugin instance
        return menu;
    };

    // Plugin default options
    $.fn.mMenu.defaults = {
        // accordion submenu mode
        accordion: {   
            slideSpeed: 200,  // accordion toggle slide speed in milliseconds
            autoScroll: true, // enable auto scrolling(focus) to the clicked menu item
            expandAll: true   // allow having multiple expanded accordions in the menu
        },
        
        // dropdown submenu mode
        dropdown: {
            timeout: 500  // timeout in milliseconds to show and hide the hoverable submenu dropdown
        }
    }; 

    // Plugin global lazy initialization
    $(document).on('click', function(e) {
        $('.m-menu__nav .m-menu__item.m-menu__item--submenu.m-menu__item--hover[data-menu-submenu-toggle="click"]').each(function() {
            var  element = $(this).parent('.m-menu__nav').parent();
            menu = element.mMenu(); 
            
            if (menu.getSubmenuMode() !== 'dropdown') { 
                return;
            }

            if ($(e.target).is(element) == false && element.find($(e.target)).length == 0) {
                element.find('.m-menu__item--submenu.m-menu__item--hover[data-menu-submenu-toggle="click"]').removeClass('m-menu__item--hover');
            }          
        });
    });
}(jQuery));

(function($) {
    // plugin setup
    $.fn.mOffcanvas = function(options) {
        // main object
        var offcanvas = this;
        var element = $(this);

        /********************
         ** PRIVATE METHODS
         ********************/
        var Plugin = {
            /**
             * Run
             */
            run: function (options) {
                if (!element.data('offcanvas')) {                      
                    // create instance
                    Plugin.init(options);
                    Plugin.build();
                    
                    // assign instance to the element                    
                    element.data('offcanvas', offcanvas);
                } else {
                    // get instance from the element
                    offcanvas = element.data('offcanvas');
                }               

                return offcanvas;
            },

            /**
             * Handles suboffcanvas click toggle
             */
            init: function(options) {
                offcanvas.events = [];

                // merge default and user defined options
                offcanvas.options = $.extend(true, {}, $.fn.mOffcanvas.defaults, options);

                offcanvas.overlay;
                
                offcanvas.classBase = offcanvas.options.class;
                offcanvas.classShown = offcanvas.classBase + '--on';
                offcanvas.classOverlay = offcanvas.classBase + '-overlay';
                
                offcanvas.state = element.hasClass(offcanvas.classShown) ? 'shown' : 'hidden';
                offcanvas.close = offcanvas.options.close;

                if (offcanvas.options.toggle && offcanvas.options.toggle.target) {
                    offcanvas.toggleTarget = offcanvas.options.toggle.target;
                    offcanvas.toggleState = offcanvas.options.toggle.state;
                } else {
                    offcanvas.toggleTarget = offcanvas.options.toggle; 
                    offcanvas.toggleState = '';
                }
            },

            /**
             * Setup offcanvas
             */
            build: function() {
                // offcanvas toggle
                $(offcanvas.toggleTarget).on('click', Plugin.toggle);

                if (offcanvas.close) {
                    $(offcanvas.close).on('click', Plugin.hide);
                }
            },

            /**
             * sync 
             */
            sync: function () {
                $(element).data('offcanvas', offcanvas);
            }, 

            /**
             * Handles offcanvas click toggle
             */
            toggle: function() {
                if (offcanvas.state == 'shown') {
                    Plugin.hide();
                } else {
                    Plugin.show();
                }
            },

            /**
             * Handles offcanvas click toggle
             */
            show: function() {
                if (offcanvas.state == 'shown') {
                    return;
                }

                Plugin.eventTrigger('beforeShow');

                if (offcanvas.toggleState != '') {
                    $(offcanvas.toggleTarget).addClass(offcanvas.toggleState);
                }
                
                $('body').addClass(offcanvas.classShown);
                element.addClass(offcanvas.classShown);

                offcanvas.state = 'shown';

                if (offcanvas.options.overlay) {
                    var overlay = $('<div class="' + offcanvas.classOverlay + '"></div>');                
                    element.after(overlay);
                    offcanvas.overlay = overlay;
                    offcanvas.overlay.on('click', function(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        Plugin.hide();
                    });
                } 

                Plugin.eventTrigger('afterShow');

                return offcanvas;
            },

            /**
             * Handles offcanvas click toggle
             */
            hide: function() {
                if (offcanvas.state == 'hidden') {
                    return;
                }

                Plugin.eventTrigger('beforeHide');

                if (offcanvas.toggleState != '') {
                    $(offcanvas.toggleTarget).removeClass(offcanvas.toggleState);
                }

                $('body').removeClass(offcanvas.classShown)
                element.removeClass(offcanvas.classShown);

                offcanvas.state = 'hidden';

                if (offcanvas.options.overlay) {
                    offcanvas.overlay.remove();
                } 

                Plugin.eventTrigger('afterHide');

                return offcanvas;
            },

            /**
             * Trigger events
             */
            eventTrigger: function(name) {
                for (i = 0; i < offcanvas.events.length; i++) {
                    var event = offcanvas.events[i];
                    if (event.name == name) {
                        if (event.one == true) {
                            if (event.fired == false) {
                                offcanvas.events[i].fired = true;
                                return event.handler.call(this, offcanvas);
                            }
                        } else {
                            return  event.handler.call(this, offcanvas);
                        }
                    }
                }
            },

            addEvent: function(name, handler, one) {
                offcanvas.events.push({
                    name: name,
                    handler: handler,
                    one: one,
                    fired: false
                });

                Plugin.sync();
            }
        };

        // main variables
        var the = this;
        
        // init plugin
        Plugin.run.apply(this, [options]);

        /********************
         ** PUBLIC API METHODS
         ********************/

        /**
         * Hide 
         */
        offcanvas.hide =  function () {
            return Plugin.hide();
        };

        /**
         * Show 
         */
        offcanvas.show =  function () {
            return Plugin.show();
        };

        /**
         * Get suboffcanvas mode
         */
        offcanvas.on =  function (name, handler) {
            return Plugin.addEvent(name, handler);
        };

        /**
         * Set offcanvas content
         * @returns {mOffcanvas}
         */
        offcanvas.one =  function (name, handler) {
            return Plugin.addEvent(name, handler, true);
        };   

        return offcanvas;
    };

    // default options
    $.fn.mOffcanvas.defaults = {
        
    }; 
}(jQuery));

(function ($) {
    // Plugin function
    $.fn.mPortlet = function (options) {
        // Plugin scope variable
        var portlet = {};
        var element = $(this);

        // Plugin class
        var Plugin = {
            /**
             * Run
             */
            run: function (options) {
                if (element.data('portlet-object')) {            
                    // get instance from the element
                    portlet = element.data('portlet-object');
                } else {                              
                    // create instance                   
                    Plugin.init(options);
                    Plugin.build();
                    
                    // assign instance to the element                    
                    element.data('portlet-object', portlet);
                }               

                return portlet;
            },

            /**
             * Initialize
             */
            init: function(options) {
                portlet.options = $.extend(true, {}, $.fn.mPortlet.defaults, options);
                portlet.events = [];
                portlet.eventOne = false;       

                if ( element.find('> .m-portlet__body').length !== 0 ) {
                    portlet.body = element.find('> .m-portlet__body');
                } else if ( element.find('> .m-form').length !== 0 ) {
                    portlet.body = element.find('> .m-form');
                }
            },

            /**
             * Build DOM and init event handlers
             */
            build: function () {
                // remove
                var remove = element.find('> .m-portlet__head [data-portlet-tool=remove]');
                if (remove.length === 1) {
                    remove.click(function(e) {
                        e.preventDefault();
                        Plugin.remove();
                    });
                }                 

                // reload
                var reload = element.find('> .m-portlet__head [data-portlet-tool=reload]')
                if (reload.length === 1) {
                    reload.click(function(e) {
                        e.preventDefault();
                        Plugin.reload();
                    });
                }

                // toggle
                var toggle = element.find('> .m-portlet__head [data-portlet-tool=toggle]');
                if (toggle.length === 1) {
                    toggle.click(function(e) {
                        e.preventDefault();
                        Plugin.toggle();
                    });
                }

                // fullscreen
                var fullscreen = element.find('> .m-portlet__head [data-portlet-tool=fullscreen]');
                if (fullscreen.length === 1) {
                    fullscreen.click(function(e) {
                        e.preventDefault();
                        Plugin.fullscreen();
                    });
                }                    

                Plugin.setupTooltips();
            }, 

            /**
             * Remove portlet
             */
            remove: function () {
                if (Plugin.eventTrigger('beforeRemove') === false) {
                    return;
                }

                if ( $('body').hasClass('m-portlet--fullscreen') && element.hasClass('m-portlet--fullscreen') ) {
                    Plugin.fullscreen('off');
                }

                Plugin.removeTooltips();

                element.remove();
                
                Plugin.eventTrigger('afterRemove');
            }, 

            /**
             * Set content
             */
            setContent: function (html) {
                if (html) {
                    portlet.body.html(html);
                }               
            },

            /**
             * Get body
             */
            getBody: function () {
                return portlet.body;
            },

            /**
             * Get self
             */
            getSelf: function () {
                return element;
            },

            /**
             * Setup tooltips
             */
            setupTooltips: function () {
                if (portlet.options.tooltips) {
                    var collapsed = element.hasClass('collapsed');
                    var fullscreenOn = $('body').hasClass('m-portlet--fullscreen') && element.hasClass('m-portlet--fullscreen');

                    var remove = element.find('> .m-portlet__head [data-portlet-tool=remove]');
                    if (remove.length === 1) {
                        remove.attr('title', portlet.options.tools.remove);
                        remove.data('placement', fullscreenOn ? 'bottom' : 'top');
                        remove.data('offset', fullscreenOn ? '0,10px,0,0' : '0,5px');
                        remove.tooltip('dispose');
                        mApp.initTooltip(remove);
                    }

                    var reload = element.find('> .m-portlet__head [data-portlet-tool=reload]');
                    if (reload.length === 1) {
                        reload.attr('title', portlet.options.tools.reload);
                        reload.data('placement', fullscreenOn ? 'bottom' : 'top');
                        reload.data('offset', fullscreenOn ? '0,10px,0,0' : '0,5px');
                        reload.tooltip('dispose');
                        mApp.initTooltip(reload);
                    }

                    var toggle = element.find('> .m-portlet__head [data-portlet-tool=toggle]');
                    if (toggle.length === 1) {
                        if (collapsed) {
                            toggle.attr('title', portlet.options.tools.toggle.expand);
                        } else {
                            toggle.attr('title', portlet.options.tools.toggle.collapse);
                        }
                        toggle.data('placement', fullscreenOn ? 'bottom' : 'top');
                        toggle.data('offset', fullscreenOn ? '0,10px,0,0' : '0,5px');
                        toggle.tooltip('dispose');
                        mApp.initTooltip(toggle);
                    }

                    var fullscreen = element.find('> .m-portlet__head [data-portlet-tool=fullscreen]');
                    if (fullscreen.length === 1) {
                        if (fullscreenOn) {
                            fullscreen.attr('title', portlet.options.tools.fullscreen.off);
                        } else {
                            fullscreen.attr('title', portlet.options.tools.fullscreen.on);
                        }
                        fullscreen.data('placement', fullscreenOn ? 'bottom' : 'top');
                        fullscreen.data('offset', fullscreenOn ? '0,10px,0,0' : '0,5px');
                        fullscreen.tooltip('dispose');
                        mApp.initTooltip(fullscreen);
                    }                
                }                   
            },

            /**
             * Setup tooltips
             */
            removeTooltips: function () {
                if (portlet.options.tooltips) {
                    var remove = element.find('> .m-portlet__head [data-portlet-tool=remove]');
                    if (remove.length === 1) {
                        remove.tooltip('dispose');
                    }

                    var reload = element.find('> .m-portlet__head [data-portlet-tool=reload]');
                    if (reload.length === 1) {
                        reload.tooltip('dispose');
                    }

                    var toggle = element.find('> .m-portlet__head [data-portlet-tool=toggle]');
                    if (toggle.length === 1) {
                        toggle.tooltip('dispose');
                    }

                    var fullscreen = element.find('> .m-portlet__head [data-portlet-tool=fullscreen]');
                    if (fullscreen.length === 1) {
                        fullscreen.tooltip('dispose');
                    }                
                }                   
            },

            /**
             * Reload
             */
            reload: function () {
                Plugin.eventTrigger('reload');                
            },

            /**
             * Toggle
             */
            toggle: function (mode) {
                if (mode === 'collapse' || element.hasClass('m-portlet--collapse') || element.hasClass('m-portlet--collapsed')) {
                    if (Plugin.eventTrigger('beforeExpand') === false) {
                        return;
                    } 

                    element.removeClass('m-portlet--collapse');
                    element.removeClass('m-portlet--collapsed');
                    Plugin.setupTooltips();

                    portlet.body.slideDown(portlet.options.bodyToggleSpeed, function(){                        
                        Plugin.eventTrigger('afterExpand');                         
                    });
                } else {
                    if (Plugin.eventTrigger('beforeCollapse') === false) {
                        return;
                    } 

                    element.addClass('m-portlet--collapse');
                    Plugin.setupTooltips();

                    portlet.body.slideUp(portlet.options.bodyToggleSpeed, function() {                        
                        Plugin.eventTrigger('afterCollapse');    
                    });
                }                  
            },

            /**
             * Toggle
             */
            fullscreen: function (mode) {
                var d = {};
                var speed = 300;

                if (mode === 'off' || ($('body').hasClass('m-portlet--fullscreen') && element.hasClass('m-portlet--fullscreen'))) {
                    Plugin.eventTrigger('beforeFullscreenOff');

                    $('body').removeClass('m-portlet--fullscreen');
                    element.removeClass('m-portlet--fullscreen');

                    Plugin.setupTooltips();
                    
                    Plugin.eventTrigger('afterFullscreenOff');
                } else {
                    Plugin.eventTrigger('beforeFullscreenOn');

                    element.addClass('m-portlet--fullscreen');
                    $('body').addClass('m-portlet--fullscreen');

                    Plugin.setupTooltips();
                    
                    Plugin.eventTrigger('afterFullscreenOn');
                }                  
            }, 

            /**
             * sync 
             */
            sync: function () {
                $(element).data('portlet', portlet);
            },

            /**
             * Trigger events
             */
            eventTrigger: function(name) {
                for (i = 0; i < portlet.events.length; i++) {
                    var event = portlet.events[i];
                    if (event.name == name) {
                        if (event.one == true) {
                            if (event.fired == false) {
                                portlet.events[i].fired = true;
                                return event.handler.call(this, portlet);
                            }
                        } else {
                            return  event.handler.call(this, portlet);
                        }
                    }
                }
            },

            /**
             * Add event
             */
            addEvent: function(name, handler, one) {
                portlet.events.push({
                    name: name,
                    handler: handler,
                    one: one,
                    fired: false
                });

                Plugin.sync();

                return portlet;
            }
        };

        // Run plugin
        Plugin.run.apply(this, [options]);

        //////////////////////
        // ** Public API ** //
        //////////////////////
       
        /**
         * Remove portlet
         * @returns {mPortlet}
         */
        portlet.remove = function () {
            return Plugin.remove(html);
        };

        /**
         * Reload portlet
         * @returns {mPortlet}
         */
        portlet.reload = function () {
            return Plugin.reload();
        };

        /**
         * Set portlet content
         * @returns {mPortlet}
         */
        portlet.setContent = function (html) {
            return Plugin.setContent(html);
        };

        /**
         * Collapse portlet
         * @returns {mPortlet}
         */
        portlet.collapse = function () {
            return Plugin.toggle('collapse');
        };

        /**
         * Expand portlet
         * @returns {mPortlet}
         */
        portlet.expand = function () {
            return Plugin.toggle('expand');
        };

        /**
         * Fullscreen portlet
         * @returns {mPortlet}
         */
        portlet.fullscreen = function () {
            return Plugin.fullscreen('on');
        };

        /**
         * Fullscreen portlet
         * @returns {mPortlet}
         */
        portlet.unFullscreen = function () {
            return Plugin.fullscreen('off');
        };

        /**
         * Get portletbody 
         * @returns {jQuery}
         */
        portlet.getBody = function () {
            return Plugin.getBody();
        };

         /**
         * Get portletbody 
         * @returns {jQuery}
         */
        portlet.getSelf = function () {
            return Plugin.getSelf();
        };

        /**
         * Set portlet content
         * @returns {mPortlet}
         */
        portlet.on =  function (name, handler) {
            return Plugin.addEvent(name, handler);
        };

        /**
         * Set portlet content
         * @returns {mPortlet}
         */
        portlet.one =  function (name, handler) {
            return Plugin.addEvent(name, handler, true);
        };        

        return portlet;
    };

    // default options
    $.fn.mPortlet.defaults = {
        bodyToggleSpeed: 400,
        tooltips: true,
        tools: {
            toggle: {
                collapse: 'Collapse', 
                expand: 'Expand'
            },
            reload: 'Reload',
            remove: 'Remove',
            fullscreen: {
                on: 'Fullscreen',
                off: 'Exit Fullscreen'
            }        
        }
    };
}(jQuery));



(function($) {
    // plugin setup
    $.fn.mScrollTop = function(options) {
        // main object
        var scrollTop = this;
        var element = $(this);

        /********************
         ** PRIVATE METHODS
         ********************/
        var Plugin = {
            /**
             * Run
             */
            run: function (options) {
                if (!element.data('scrollTop')) {                      
                    // create instance
                    Plugin.init(options);
                    Plugin.build();
                    
                    // assign instance to the element                    
                    element.data('scrollTop', scrollTop);
                } else {
                    // get instance from the element
                    scrollTop = element.data('scrollTop');
                }               

                return scrollTop;
            },

            /**
             * Handles subscrollTop click scrollTop
             */
            init: function(options) {
                scrollTop.element = element;    
                scrollTop.events = [];

                // merge default and user defined options
                scrollTop.options = $.extend(true, {}, $.fn.mScrollTop.defaults, options);
            },

            /**
             * Setup scrollTop
             */
            build: function() {
                // handle window scroll
                if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
                    $(window).bind("touchend touchcancel touchleave", function() {
                        Plugin.handle();
                    });
                } else {
                    $(window).scroll(function() {
                        Plugin.handle();
                    });
                }

                // handle button click 
                element.on('click', Plugin.scroll);
            },

            /**
             * sync 
             */
            sync: function () {
                $(element).data('scrollTop', scrollTop);
            }, 

            /**
             * Handles offcanvas click scrollTop
             */
            handle: function() {
                var pos = $(window).scrollTop(); // current vertical position
                if (pos > scrollTop.options.offset) {
                    $("body").addClass('m-scroll-top--shown');
                } else {
                    $("body").removeClass('m-scroll-top--shown');
                }
            },

            /**
             * Handles offcanvas click scrollTop
             */
            scroll: function(e) {
                e.preventDefault();

                $("html, body").animate({
                    scrollTop: 0
                }, scrollTop.options.speed);
            },

            /**
             * Trigger events
             */
            eventTrigger: function(name) {
                for (i = 0; i < scrollTop.events.length; i++) {
                    var event = scrollTop.events[i];
                    if (event.name == name) {
                        if (event.one == true) {
                            if (event.fired == false) {
                                scrollTop.events[i].fired = true;
                                return event.handler.call(this, scrollTop);
                            }
                        } else {
                            return  event.handler.call(this, scrollTop);
                        }
                    }
                }
            },

            addEvent: function(name, handler, one) {
                scrollTop.events.push({
                    name: name,
                    handler: handler,
                    one: one,
                    fired: false
                });

                Plugin.sync();
            }
        };

        // main variables
        var the = this;
        
        // init plugin
        Plugin.run.apply(this, [options]);

        /********************
         ** PUBLIC API METHODS
         ********************/

        /**
         * Get subscrollTop mode
         */
        scrollTop.on =  function (name, handler) {
            return Plugin.addEvent(name, handler);
        };

        /**
         * Set scrollTop content
         * @returns {mScrollTop}
         */
        scrollTop.one =  function (name, handler) {
            return Plugin.addEvent(name, handler, true);
        };   

        return scrollTop;
    };

    // default options
    $.fn.mScrollTop.defaults = {
        offset: 300,
        speed: 600
    }; 
}(jQuery));
(function($) {
    // plugin setup
    $.fn.mToggle = function(options) {
        // main object
        var toggle = this;
        var element = $(this);

        /********************
         ** PRIVATE METHODS
         ********************/
        var Plugin = {
            /**
             * Run
             */
            run: function (options) {
                if (!element.data('toggle')) {                      
                    // create instance
                    Plugin.init(options);
                    Plugin.build();
                    
                    // assign instance to the element                    
                    element.data('toggle', toggle);
                } else {
                    // get instance from the element
                    toggle = element.data('toggle');
                }               

                return toggle;
            },

            /**
             * Handles subtoggle click toggle
             */
            init: function(options) {
                toggle.element = element;    
                toggle.events = [];

                // merge default and user defined options
                toggle.options = $.extend(true, {}, $.fn.mToggle.defaults, options);

                toggle.target = $(toggle.options.target);
                toggle.targetState = toggle.options.targetState;
                toggle.togglerState = toggle.options.togglerState;

                toggle.state = mUtil.hasClasses(toggle.target, toggle.targetState) ? 'on' : 'off';
            },

            /**
             * Setup toggle
             */
            build: function() {
                element.on('click', Plugin.toggle);
            },

            /**
             * sync 
             */
            sync: function () {
                $(element).data('toggle', toggle);
            }, 

            /**
             * Handles offcanvas click toggle
             */
            toggle: function() {
                if (toggle.state == 'off') {
                    Plugin.on();
                } else {
                    Plugin.off();
                }
            },

            /**
             * Handles toggle click toggle
             */
            on: function() {
                Plugin.eventTrigger('beforeOn');
                
                toggle.target.addClass(toggle.targetState);

                if (toggle.togglerState) {
                    element.addClass(toggle.togglerState);
                }

                toggle.state = 'on';

                Plugin.eventTrigger('afterOn');

                return toggle;
            },

            /**
             * Handles toggle click toggle
             */
            off: function() {
                Plugin.eventTrigger('beforeOff');

                toggle.target.removeClass(toggle.targetState);

                if (toggle.togglerState) {
                    element.removeClass(toggle.togglerState);
                }

                toggle.state = 'off';

                Plugin.eventTrigger('afterOff');

                return toggle;
            },

            /**
             * Trigger events
             */
            eventTrigger: function(name) {
                for (i = 0; i < toggle.events.length; i++) {
                    var event = toggle.events[i];
                    if (event.name == name) {
                        if (event.one == true) {
                            if (event.fired == false) {
                                toggle.events[i].fired = true;
                                return event.handler.call(this, toggle);
                            }
                        } else {
                            return  event.handler.call(this, toggle);
                        }
                    }
                }
            },

            addEvent: function(name, handler, one) {
                toggle.events.push({
                    name: name,
                    handler: handler,
                    one: one,
                    fired: false
                });

                Plugin.sync();
            }
        };

        // main variables
        var the = this;
        
        // init plugin
        Plugin.run.apply(this, [options]);

        /********************
         ** PUBLIC API METHODS
         ********************/

        /**
         * Get subtoggle mode
         */
        toggle.on =  function (name, handler) {
            return Plugin.addEvent(name, handler);
        };

        /**
         * Set toggle content
         * @returns {mToggle}
         */
        toggle.one =  function (name, handler) {
            return Plugin.addEvent(name, handler, true);
        };   

        return toggle;
    };

    // default options
    $.fn.mToggle.defaults = {

        togglerState: '',
        targetState: ''
    }; 
}(jQuery));
$.notifyDefaults({
	template: '' +
	'<div data-notify="container" class="alert alert-{0} m-alert" role="alert">' +
	'<button type="button" aria-hidden="true" class="close" data-notify="dismiss"></button>' +
	'<span data-notify="icon"></span>' +
	'<span data-notify="title">{1}</span>' +
	'<span data-notify="message">{2}</span>' +
	'<div class="progress" data-notify="progressbar">' +
	'<div class="progress-bar progress-bar-animated bg-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
	'</div>' +
	'<a href="{3}" target="{4}" data-notify="url"></a>' +
	'</div>'
});

  $.fn.markdown.defaults.iconlibrary = 'fa';
//$.fn.bootstrapSwitch.defaults.size = 'large';
//$.fn.bootstrapSwitch.defaults.onColor = 'success';
$.fn.timepicker.defaults = $.extend(true, {}, $.fn.timepicker.defaults, {
    icons: {
        up: 'la la-angle-up',
        down: 'la la-angle-down'  
    }
});
jQuery.validator.setDefaults({
	errorElement: 'div', //default input error message container
    errorClass: 'form-control-feedback', // default input error message class
    focusInvalid: false, // do not focus the last invalid input
    ignore: "",  // validate all fields including form hidden input

    errorPlacement: function(error, element) { // render error placement for each input type
    	var group = $(element).closest('.form-group');
        var help = group.find('.m-form__help');
        if (help.length > 0) {
            help.before(error); 
        } else {
            $(element).after(error);
        }
    },

    highlight: function(element) { // hightlight error inputs
    	$(element).closest('.form-group').addClass('has-danger'); // set error class to the control group
        if ($(element).hasClass('form-control')) {
        	//$(element).addClass('form-control-danger');
        }
    },

    unhighlight: function(element) { // revert the change done by hightlight
        $(element).closest('.form-group').removeClass('has-danger'); // set error class to the control group
        //$(element).removeClass('form-control-danger');
    },

    success: function(label, element) {
    	$(label).closest('.form-group').addClass('has-success').removeClass('has-danger'); // set success class to the control group
        $(label).closest('.form-group').find('.form-control-feedback').remove();
        //$(element).removeClass('form-control-danger');
        //$(element).addClass('form-control-success');
    }
});
var mLayout = function() {
    var horMenu;
    var asideMenu;
    var asideMenuOffcanvas;
    var horMenuOffcanvas;

    var initStickyHeader = function() {
        var header = $('.m-header');
        var options = {
            offset: {},
            minimize:{}       
        };

        if (header.data('minimize-mobile') == 'hide') {
            options.minimize.mobile = {};
            options.minimize.mobile.on = 'm-header--hide';
            options.minimize.mobile.off = 'm-header--show';
        } else {
            options.minimize.mobile = false;
        }

        if (header.data('minimize') == 'hide') {
            options.minimize.desktop = {};
            options.minimize.desktop.on = 'm-header--hide';
            options.minimize.desktop.off = 'm-header--show';
        } else {
            options.minimize.desktop = false;
        }

        if (header.data('minimize-offset')) {
            options.offset.desktop = header.data('minimize-offset');
        }

        if (header.data('minimize-mobile-offset')) {
            options.offset.mobile = header.data('minimize-mobile-offset');
        }        

        header.mHeader(options);
    }

    // handle horizontal menu
    var initHorMenu = function() { 
        // init aside left offcanvas
        horMenuOffcanvas = $('#m_header_menu').mOffcanvas({
            class: 'm-aside-header-menu-mobile',
            overlay: true,
            close: '#m_aside_header_menu_mobile_close_btn',
            toggle: {
                target: '#m_aside_header_menu_mobile_toggle',
                state: 'm-brand__toggler--active'
            }            
        });
        
        horMenu = $('#m_header_menu').mMenu({
            // submenu modes
            submenu: {
                desktop: 'dropdown',
                tablet: 'accordion',
                mobile: 'accordion'
            },
            // resize menu on window resize
            resize: {
                desktop: function() {
                    var headerNavWidth = $('#m_header_nav').width();
                    var headerMenuWidth = $('#m_header_menu_container').width();
                    var headerTopbarWidth = $('#m_header_topbar').width();
                    var spareWidth = 20;

                    if ((headerMenuWidth + headerTopbarWidth + spareWidth) > headerNavWidth ) {
                        return false;
                    } else {
                        return true;
                    }
                }
            }    
        });
    }

    // handle vertical menu
    var initLeftAsideMenu = function() {
        var menu = $('#m_ver_menu');

        // init aside menu
        var menuOptions = {  
            // submenu setup
            submenu: {
                desktop: {
                    // by default the menu mode set to accordion in desktop mode
                    default: (menu.data('menu-dropdown') == true ? 'dropdown' : 'accordion'),
                    // whenever body has this class switch the menu mode to dropdown
                    state: {
                        body: 'm-aside-left--minimize',  
                        mode: 'dropdown'
                    }
                },
                tablet: 'accordion', // menu set to accordion in tablet mode
                mobile: 'accordion'  // menu set to accordion in mobile mode
            },

            //accordion setup
            accordion: {
                autoScroll: true,
                expandAll: false
            }
        };

        asideMenu = menu.mMenu(menuOptions);

        // handle fixed aside menu
        if (menu.data('menu-scrollable')) {
            function initScrollableMenu(obj) {    
                if (mUtil.isInResponsiveRange('tablet-and-mobile')) {
                    // destroy if the instance was previously created
                    mApp.destroyScroller(obj);
                    return;
                }

                var height = mUtil.getViewPort().height - $('.m-header').outerHeight()
                    - ($('.m-aside-left .m-aside__header').length != 0 ? $('.m-aside-left .m-aside__header').outerHeight() : 0)
                    - ($('.m-aside-left .m-aside__footer').length != 0 ? $('.m-aside-left .m-aside__footer').outerHeight() : 0);
                    //- $('.m-footer').outerHeight(); 

                // create/re-create a new instance
                mApp.initScroller(obj, {height: height});
            }

            initScrollableMenu(asideMenu);
            
            mUtil.addResizeHandler(function() {            
                initScrollableMenu(asideMenu);
            });   
        }      
    }

    // handle vertical menu
    var initLeftAside = function() {
        // init aside left offcanvas
        var asideOffcanvasClass = ($('#m_aside_left').hasClass('m-aside-left--offcanvas-default') ? 'm-aside-left--offcanvas-default' : 'm-aside-left');

        asideMenuOffcanvas = $('#m_aside_left').mOffcanvas({
            class: asideOffcanvasClass,
            overlay: true,
            close: '#m_aside_left_close_btn',
            toggle: {
                target: '#m_aside_left_offcanvas_toggle',
                state: 'm-brand__toggler--active'                
            }            
        });        
    }

    // handle sidebar toggle
    var initLeftAsideToggle = function() {
        $('#m_aside_left_minimize_toggle').mToggle({
            target: 'body',
            targetState: 'm-brand--minimize m-aside-left--minimize',
            togglerState: 'm-brand__toggler--active'
        }).on('toggle', function() {
            horMenu.pauseDropdownHover(800);
            asideMenu.pauseDropdownHover(800);
        });

        $('#m_aside_left_hide_toggle').mToggle({
            target: 'body',
            targetState: 'm-aside-left--hide',
            togglerState: 'm-brand__toggler--active'
        }).on('toggle', function() {
            horMenu.pauseDropdownHover(800);
            asideMenu.pauseDropdownHover(800);
        })
    }

    var initTopbar = function() {
        $('#m_aside_header_topbar_mobile_toggle').click(function() {
            $('body').toggleClass('m-topbar--on');
        });                                  

        // Animated Notification Icon 
        setInterval(function() {
            $('#m_topbar_notification_icon .m-nav__link-icon').addClass('m-animate-shake');
            $('#m_topbar_notification_icon .m-nav__link-badge').addClass('m-animate-blink');
        }, 3000);

        setInterval(function() {
            $('#m_topbar_notification_icon .m-nav__link-icon').removeClass('m-animate-shake');
            $('#m_topbar_notification_icon .m-nav__link-badge').removeClass('m-animate-blink');
        }, 6000);
    }


    var initScrollTop = function() {
        $('[data-toggle="m-scroll-top"]').mScrollTop({
            offset: 300,
            speed: 600
        });
    }

    return {
        init: function() {  
            this.initHeader();
            this.initAside();
        },

        initHeader: function() {
            initStickyHeader();
            initHorMenu();
            initTopbar();

            initScrollTop();
        },

        initAside: function() {
            initLeftAside();
            initLeftAsideMenu();            
            initLeftAsideToggle();
        },

        getAsideMenu: function() {
            return asideMenu;
        },

        closeMobileAsideMenuOffcanvas: function() {
            if (mUtil.isMobileDevice()) {
                asideMenuOffcanvas.hide();
            }
        },

        closeMobileHorMenuOffcanvas: function() {
            if (mUtil.isMobileDevice()) {
                horMenuOffcanvas.hide();
            }
        }
    };
}();

$(document).ready(function() {
    if (mUtil.isAngularVersion() === false) {
        mLayout.init();
    }
});


var mQuickSidebar = function() {
    var topbarAside = $('#m_quick_sidebar');
    var topbarAsideTabs = $('#m_quick_sidebar_tabs');    
    var topbarAsideClose = $('#m_quick_sidebar_close');
    var topbarAsideToggle = $('#m_quick_sidebar_toggle');
    var topbarAsideContent = topbarAside.find('.m-quick-sidebar__content');

    var initSettings = function() { 
        // init dropdown tabbable content
        var init = function() {
            var settings = $('#m_quick_sidebar_tabs_settings');
            var height = mUtil.getViewPort().height - topbarAsideTabs.outerHeight(true) - 60;

            // init settings scrollable content
            settings.css('height', height);
            mApp.initScroller(settings, {});
        }

        init();

        // reinit on window resize
        mUtil.addResizeHandler(init);
    }

    var initLogs = function() {
        // init dropdown tabbable content
        var init = function() {
            var logs = $('#m_quick_sidebar_tabs_logs');
            var height = mUtil.getViewPort().height - topbarAsideTabs.outerHeight(true) - 60;

            // init settings scrollable content
            logs.css('height', height);
            mApp.initScroller(logs, {});
        }

        init();

        // reinit on window resize
        mUtil.addResizeHandler(init);
    }

    var initOffcanvasTabs = function() {

        initSettings();
        initLogs();
    }

    var initOffcanvas = function() {
        topbarAside.mOffcanvas({
            class: 'm-quick-sidebar',
            //overlay: false,  
            close: topbarAsideClose,
            toggle: topbarAsideToggle
        });   

        // run once on first time dropdown shown
        topbarAside.mOffcanvas().one('afterShow', function() {
            mApp.block(topbarAside);

            setTimeout(function() {
                mApp.unblock(topbarAside);
                
                topbarAsideContent.removeClass('m--hide');

                initOffcanvasTabs();
            }, 1000);                         
        });
    }

    return {     
        init: function() {  
            initOffcanvas(); 
        }
    };
}();

$(document).ready(function() {
    mQuickSidebar.init();
});