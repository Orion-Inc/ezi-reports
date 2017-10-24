'use strict';

$(document).ready(function() {

    // Element Blocking
    // --------------------------------------------------

    function blockUI(element) {
        $(element).block({
            message: '<div class=\'sk-three-bounce\'><div class=\'sk-child sk-bounce1\'></div><div class=\'sk-child sk-bounce2\'></div><div class=\'sk-child sk-bounce3\'></div></div>',
            css: {
                border: 'none',
                backgroundColor: 'transparent'
            },
            overlayCSS: {
                backgroundColor: '#FAFEFF',
                opacity: 0.5,
                cursor: 'wait'
            }
        });
    }

    function unblockUI(element) {
        $(element).unblock();
    }

    // Toggle Sidebar
    // --------------------------------------------------

    $('.hamburger-menu').on('click', function() {
        $(this).toggleClass('active');
        $('.main-sidebar').toggleClass('closed');
    });

    // Toogle Searchbar
    // --------------------------------------------------

    $('.search-bar-toggle').on('click', function() {
        $('.search-bar').toggleClass('closed');
    });

    // Toggle Right Sidebar
    // --------------------------------------------------

    $('.right-sidebar-toggle').on('click', function() {
        $('.right-sidebar').toggleClass('closed');
    });

    // Toggle Conversation Sidebar
    // --------------------------------------------------

    $('.conversation-toggle').on('click', function() {
        $('.conversation').toggleClass('closed');
    });

    // Toggle Demo Settings
    // --------------------------------------------------

    $('.setting-toggle').on('click', function() {
        $('.setting').toggleClass('closed');
    });

    // Toggle Fullscreen
    // --------------------------------------------------

    $('.fullscreen-toggle').on('click', function() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    });

    // Tooltips & Popovers
    // --------------------------------------------------

    $('[data-toggle=\'tooltip\']').tooltip();
    $('[data-toggle=\'popover\']').popover();

    // Widget Control
    // --------------------------------------------------

    $('.widget-collapse').on('click', function() {
        $(this).closest('.widget').find('.widget-body').slideToggle(300);
    });
    $('.widget-reload').on('click', function() {
        var element = $(this).closest('.widget');
        blockUI(element);
        window.setTimeout(function() {
            unblockUI(element);
        }, 3000);
    });
    $('.widget-remove').on('click', function() {
        $(this).closest('.widget').hide();
    });

    // Progressbar
    // --------------------------------------------------

    if ($('.progress').length > 0) {
        $('.progress .progress-bar').progressbar();
    }

    // Managing CSS animations
    // --------------------------------------------------

    $('.animated').animo({
        duration: 0.2
    });

});