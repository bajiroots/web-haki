
$(document).ready(function() {
    
    "use strict";

    var simulateClick = function (elem) {
        // Create our event (with options)
        var evt = new MouseEvent('click', {
            bubbles: true,
            cancelable: true,
            view: window
        });
    };

    $('#check-all-mail').on('click', function() {
        if(!$(this).is(':checked')) {
            $('.inbox-list li a .custom-control input:checked').prop("checked", false).parent().parent().parent().removeClass('selected');
        } else {
            $('.inbox-list li a .custom-control input:not(:checked)').prop("checked", true).parent().parent().parent().addClass('selected');
        }
    });

    $('.inbox-list li a .custom-control input').change(function(event){
        if($(this).is(':checked')) {
            $(this).parent().parent().parent().addClass('selected');
            event.stopPropagation();
        } else {
            $(this).parent().parent().parent().removeClass('selected');
            event.stopPropagation();
        }
    });

    $('.inbox-list li a .mail-star i').on('click', function(e) {
        if($(this).parent().hasClass('important')) {
            $(this).html('star_border');
            $(this).parent().removeClass('important');
        } else {
            $(this).html('star');
            $(this).parent().addClass('important');
        }

        event.stopPropagation();
        e.preventDefault();
    });

    $('#mail-compose').on('click', function(e) {
        $('.mailbox-compose').toggleClass('show');
        $('body').toggleClass('mailbox-compose-show');

        e.preventDefault();
    });

    $('.mailbox-compose-overlay').on('click', function() {
        $('.mailbox-compose').toggleClass('show');
        $('body').toggleClass('mailbox-compose-show');
    });


    $('.inbox-list li a').on('click', function(e) {
        $('.mailbox-item').toggleClass('show');
        $('body').toggleClass('mailbox-item-show');
        e.stopPropagation();
    });

    $('.mailbox-item-overlay').on('click', function() {
        $('.mailbox-item').toggleClass('show');
        $('body').toggleClass('mailbox-item-show');
    });
});