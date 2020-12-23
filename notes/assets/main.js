width = $(window).width();
if (width < 768) {
    $('.focus-mode-icon').removeClass('fas fa-caret-square-left').addClass('fas fa-caret-square-right');
    $('.navbar-right').removeClass('d-none').addClass('d-inline');
    $('.right-column').removeClass('d-none').addClass('d-inline');
    $('.navbar-left').removeClass('d-inline').addClass('d-none');
    $('.left-column').removeClass('d-inline').addClass('d-none');
} else {
    $('.focus-mode-icon').removeClass('fas fa-caret-square-right').addClass('fas fa-caret-square-left')
}


$("#focus-mode-icon").click(function() {
    if ($('.focus-mode-icon').hasClass('fa-caret-square-left')) {
        $('.right-column').toggleClass('hide');
        $('.navbar-right').toggleClass('hide');
        $('.left-column').removeClass('col-md-8 col-lg-9').addClass('col-12');
        $('.navbar-left').removeClass('col-md-8 col-lg-9').addClass('col-12');
        $('.focus-mode-icon').removeClass('fa-caret-square-left').addClass('fa-caret-square-right');
        /*
        $('.right-column').toggleClass('hide');
        $('.left-column').removeClass('col-12').addClass('col-md-8 col-lg-9');
        $('.navbar-right').addClass('d-md-inline');
        $('.navbar-left').removeClass('col-12').addClass('col-md-8 col-lg-9 ');
        $('.focus-mode-icon').removeClass('fa-caret-square-right').addClass('fa-caret-square-left');
        */
    } else {
        width = $(window).width();
        if (width < 768) {
            $('.navbar-right').removeClass('d-none').addClass('d-inline');
            $('.right-column').removeClass('d-none').addClass('d-inline');
            $('.navbar-left').removeClass('d-inline').addClass('d-none');
            $('.left-column').removeClass('d-inline').addClass('d-none');


        } else {
            $('.right-column').removeClass('hide');
            $('.navbar-right').removeClass('hide');
            $('.left-column').removeClass('col-12').addClass('col-md-8 col-lg-9');
            $('.navbar-left').removeClass('col-12').addClass('col-md-8 col-lg-9');
            $('.focus-mode-icon').removeClass('fa-caret-square-right').addClass('fa-caret-square-left');
        }

        /*
        $('.right-column').addClass('d-none');
        
        $('.left-column').removeClass('col-md-8 col-lg-9').addClass('col-12');
        $('.navbar-right').removeClass('d-md-inline');
        $('.navbar-left').removeClass('col-md-8 col-lg-9 ').addClass('col-12');
        $('.focus-mode-icon').removeClass('fa-caret-square-left').addClass('fa-caret-square-right');
        */
    }

});

/* Hamburger menu */
$('.fa-bars').click(function() {
    $('.tags-section').css('width', '250px');
    $('.tags-section').css('visibility', 'visible');
    $('.tags-section-content').css('display', 'inline');

})
$('.close-tags-section').click(function() {
    $('.tags-section-content').css('display', 'none');
    $('.tags-section').css('width', '0');
})

// Hover on list

$(document).on("click", ".note-list-item", function() {

    $('.note-list-item').mouseover(function() {
        if ($(this).css('backgroundColor') != 'rgba(243, 163, 44, 0.5)') {
            $(this).css('background', 'rgba(243, 163, 44, 0.3)');
            $(this).css('border-right', '1px solid #e9e9e9');
            $(this).css('cursor', 'pointer');
        }

    });

    $('.note-list-item').mouseleave(function() {
        if ($(this).css('backgroundColor') != 'rgba(243, 163, 44, 0.5)') {
            $(this).css('background', 'inherit');

        }
    });

});

//Info
$('.fa-info-circle').click(function() {
    if ($('.info-box').css('visibility') == 'visible') {
        $('.info-box').css('height', '0');
        $('.info-box').css('visibility', 'hidden');
        $('.info-box-p').css('height', '0');
        $('.info-box-p').css('visibility', 'hidden');
    } else {
        $('.info-box').css('height', '100px');
        $('.info-box').css('visibility', 'visible');
        $('.info-box-p').css('height', '100px');
        $('.info-box-p').css('visibility', 'visible');
    }
});

//Dark mode
$('#dark-mode').click(function() {
    var bodyBg = ($("body").css("background-color"));

    if (bodyBg == 'rgb(38, 38, 38)') {
        $('body').css('background-color', '#fff');
        $('body').css('color', '#444');
        $('input').css('background-color', '#fff');
        $('input').css('color', '#444');
        $('#dark-mode').removeClass('fas fa-sun').addClass('far fa-moon');
    } else {
        $('body').css('background-color', '#262626');
        $('body').css('color', '#eee');
        $('input').css('background-color', '#262626');
        $('input').css('color', '#eee');
        $('#dark-mode').removeClass('far fa-moon').addClass('fas fa-sun');


    }

});