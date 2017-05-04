$('nav ul li a').each(function() {
    console.log('window.location');
    if ($(this).attr('href') === window.location.pathname) {
        $(this).parent().addClass('active');
    }
});