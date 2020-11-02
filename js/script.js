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


});