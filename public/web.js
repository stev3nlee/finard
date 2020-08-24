$(document).ready(function() {
    $(".only-number").keydown(function(e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode >= 35 && e.keyCode <= 39)) {
            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $('.click-menu').click(function(event) {
        $('.box-menu').slideToggle('open');
    });
    $('.drop-menu').click(function(event) {
        $('.have-drop').removeClass('open');
        $(this).parents('li').find('.have-drop').toggleClass('open');
    });

    $("html").click(function(a) {
        if (!$(a.target).parents().is(".drop-menu") && !$(a.target).is("#menu") && !$(a.target).is(".drop-menu")) {
            $('.have-drop').removeClass('open');
        }
    });

    $("html").click(function(a) {
        if (!$(a.target).parents().is(".click-menu") && !$(a.target).is("#menu") && !$(a.target).parents().is(".list-menu")) {
            $('.box-menu').slideUp();
        }
    });
});