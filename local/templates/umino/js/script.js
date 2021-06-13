function pre(data) {console.log(data);}
$(document).ready(function () {

    // mobile header
    $('.header__burger').on('click', function (event) {
        $('.header__burger,.header__menu').toggleClass('active');

    });

    // popup
    $('.popup__close, .popup__body').on('click', function (event) {
        if (event.target != event.currentTarget)
            return;
        $('.popup').toggleClass('open');
    });

    // search
    $('.search__open, .search__close, .search').on('click', function (event) {
        if (event.target != event.currentTarget)
            return;
        $('.search').toggleClass('open');
    });

    // inner page image
    /*
    (function () {
        var imageBlock = $('.inner-page__image'),
            imageSRC = $('.inner-page__image img').attr('src');
        $.ajax({
            type: 'POST',
            url: '/ajax/innerPageImage.php',
            data: {image : imageSRC},
            success: function (data) {
                console.log(data);
            }
        });
    })();
    */
});