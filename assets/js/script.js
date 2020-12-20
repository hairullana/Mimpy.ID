// scroll
$(window).scroll(function () {

    // ambil jarak ke atas
    var wScroll = $(this).scrollTop();

    // jumbotron
    // wScroll 100
    $('.jumbotron-index h1').css({
        'transform': 'translate(0px, ' + wScroll / 4 + '%)'
    });

    $('.jumbotron-index p').css({
        'transform': 'translate(0px, ' + wScroll / 2 + '%)'
    });

    $('.jumbotron-index button').css({
        'transform': 'translate(0px, ' + wScroll / 2 + '%)'
    });


});