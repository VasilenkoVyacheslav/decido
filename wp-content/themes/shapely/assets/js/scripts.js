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
                } else if (stickyTop < windowTop+stickOffset) {
                    $sticky.css({ position: 'fixed', top: stickOffset + 40 });
                } else {
                    $sticky.css({position: 'absolute', top: 'initial'});
                }
            });

        }
    });
});