function fixSizes() {
    $('.dynamic-padding').each(function(){
        $(this).css({
            'padding-top' : $('#navbar').outerHeight() + 20 + 'px',
            'padding-bottom' : $('#footer').outerHeight() + 10 + 'px'
        });
    });
}

$(window).ready(function () {
    fixSizes();
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('.overlay').toggleClass('active');
        $(this).toggleClass('active');
    });
    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('.overlay').removeClass('active');
    });
});

$(window).resize(function () {
    fixSizes();
});