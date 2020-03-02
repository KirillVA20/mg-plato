$(document).ready(function () {
    // fancybox
    // ------------------------------------------------------------
    $('.fancy-modal').fancybox({
        'overlayShow': false,
        animationEffect: "zoom",
        buttons: [
            "zoom",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],
    });
}); // end ready