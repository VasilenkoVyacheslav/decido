    let mainNavLinks = document.querySelectorAll(".fixed-menu .menu-item a");
    let mainSections = document.querySelectorAll(".hasSidebar .main-content section");

    let lastId;
    let cur = [];

    window.addEventListener("scroll", event => {
        let fromTop = window.scrollY;

        mainNavLinks.forEach(link => {
            let section = document.querySelector(link.hash);

            if (
                section.offsetTop <= fromTop &&
                section.offsetTop + section.offsetHeight > fromTop
            ) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    });
jQuery(function($){
    $( document ).ready(function() {
        if($('.hasSidebar').length > 0){
            var $sticky = $('.fixed-menu');
            var $stickyrStopper = $('.sticky-stopper');
            if (!!$sticky.offset()) { // make sure ".sticky" element exists

                var generalSidebarHeight = $sticky.innerHeight();
                var stickyTop = $sticky.offset().top;
                var stickOffset = 0;
                var stickyStopperPosition = $stickyrStopper.offset().top;
                var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
                var diff = stopPoint + stickOffset;

                $(window).scroll(function(){ // scroll event
                    var windowTop = $(window).scrollTop(); // returns number

                    if (stopPoint < windowTop) {
                        $sticky.css({ position: 'absolute', top: diff });
                        $sticky.removeClass('fix');
                    } else if (stickyTop < windowTop+stickOffset) {
                        $sticky.css({ position: 'fixed', top: stickOffset + 40 });
                        $sticky.addClass('fix');
                    } else {
                        $sticky.css({position: 'absolute', top: 'initial'});
                        $sticky.removeClass('fix');
                    }
                });
            }
        }
    });

    // Show popup
    $('.js-popup').on('click', function () {
        $('#popup-wrapper').fadeIn();
    });
    $('.close-popup').on('click', function () {
        $(this).closest('#popup-wrapper').fadeOut();
    });
    $(document).mouseup(function (e){
        var block = $(".popup-cooperation");
        if (!block.is(e.target) && block.has(e.target).length === 0) {
            $('#popup-wrapper').fadeOut();
        }
    });
});