// scroll
$(window).scroll(function () {

    var wScroll = $(this).scrollTop();

    // jumbotron
    $('.jumbotron h1').css({
        'transform': 'translate(0px, ' + wScroll / 4 + '%)'
    });

    $('.jumbotron p').css({
        'transform': 'translate(0px, ' + wScroll / 2 + '%)'
    });

    $('.jumbotron button').css({
        'transform': 'translate(0px, ' + wScroll / 1.5 + '%)'
    });


    // portfolio
    if (wScroll > $('.portfolio').offset().top - 250) {
        $('.portfolio .thumbnail').each(function (i) {
            setTimeout(function () {
                $('.portfolio .thumbnail').eq(i).addClass('muncul');
            }, 300 * (i + 1));
        });

    }
});