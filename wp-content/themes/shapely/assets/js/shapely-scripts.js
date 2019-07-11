/* jshint es3:false, esversion:6 */
(function ($) {// jscs:ignore validateLineBreaks

  let clNav, clNavOuterHeight, windowW, menu, farRight, isOnScreen, difference, videos, recentEntries, searchInterval,
    shapelyCf, element, newURL, scrollToID;



var masonryUpdate = function(container) {
    setTimeout(function() {
       
        container.masonry( );
        // console.log('masonryUpdate');
    }, 350);
}
var masonryReload = function(container) {
    setTimeout(function() {
         var $content = container.find('li:not([style])');
         container.masonry( 'appended', $content);
        console.log('masonryReload');
        $( '#shop-wrapp .load-more' ).appendTo('#shop-wrapp');
    }, 350);
}
var masonryReloadProj = function(container) {
    setTimeout(function() {
         var $content = container.find('.project-post:not([style])');
         container.masonry( 'appended', $content);
        console.log('masonryReload');
       
    }, 350);
}
function init(){
    
    masonryUpdate($('#gallery-imgs'));
    masonryUpdate( $('.woocommerce-page').find('ul.products'));
    
    
//masonryUpdate($('.monsonry-container'));


$('#shop-wrapp').find('.product').hover(function(){
   var title_w = $(this).find('.product-title').width(); 
   title_w = +title_w/2;
   var cat_w = $(this).find('.category').width(); 
   cat_w = +cat_w/2;
   
   var price_w = $(this).find('.price-wr').width(); 
   price_w = +price_w/2;
   $(this).find('.product-title').css({
      'left': 'calc(50% - '+title_w+'px)' 
   });
    $(this).find('.category').css({
      'left': 'calc(50% - '+cat_w+'px)' 
   });
    $(this).find('.price-wr').css({
      'left': 'calc(50% - '+price_w+'px)' 
   });
}, function(){
     $(this).find('.product-title').css({
      'left': 0 
   });
    $(this).find('.category').css({
        'left': 0 
    });
     $(this).find('.price-wr').css({
      'left': 0
   });
});



$('.recomended-product').hover(function(){
   var title_w = $(this).find('.product-title').width(); 
   title_w = +title_w/2;
   var cat_w = $(this).find('.category').width(); 
   cat_w = +cat_w/2;
     var price_w = $(this).find('.price-wr').width(); 
   price_w = +price_w/2;
   $(this).find('.product-title').css({
      'left': 'calc(50% - '+title_w+'px)' 
   });
    $(this).find('.category').css({
      'left': 'calc(50% - '+cat_w+'px)' 
   });
      $(this).find('.price-wr').css({
      'left': 'calc(50% - '+price_w+'px)' 
   });
}, function(){
     $(this).find('.product-title').css({
      'left': 0 
   });
    $(this).find('.category').css({
        'left': 0 
    });
     $(this).find('.price-wr').css({
      'left': 0
   });
});



$('.term-item').hover(function(){
   var title_w = $(this).find('h3').width(); 
   title_w = +title_w/2;
   var cat_w = $(this).find('.text-ww span').width(); 
   cat_w = +cat_w/2;
   $(this).find('h3').css({
      'margin-left': 'calc(50% - '+title_w+'px)' 
   });
    $(this).find('.text-ww span').css({
      'margin-left': 'calc(50% - '+cat_w+'px)' 
   });
}, function(){
     $(this).find('h3').css({
      'margin-left': 0 
   });
    $(this).find('.text-ww span').css({
        'margin-left': 0 
    });
});


    $('#product-menu-wr').find('.fixed-menu').each(function(){
    var $this = $(this);
    var footer = $('footer').outerHeight();
    var $body = $(document).height();
    
  
    $(window).on('scroll', function(){
   // console.log('Scroll');
     var footer_pos = $('footer').offset().top;
    // console.log(footer_pos);
     var menu = $this.offset().top;
     var scroll = $(window).scrollTop();
    
    
     var $obzor = $('#gallery-imgs');
    var $details = $('#details');
    var $materials = $('#materials');
    var $sizes = $('#sizes');
   

     // console.log(scroll+' '+$obzor.offset().top+' '+$obzor.height());
     if(scroll<$obzor.offset().top+$obzor.height()-300){
       $('a.smooth-scroll[href="#obzor"]').addClass('active');
     }else{
       $('a.smooth-scroll[href="#obzor"]').removeClass('active');
     }
       if(scroll>$details.position().top && scroll<$details.position().top+$details.height()){
       $('a.smooth-scroll[href="#details"]').addClass('active');
     }else{
       $('a.smooth-scroll[href="#details"]').removeClass('active');
     }
      if(scroll>$materials.position().top && scroll<$materials.position().top+$materials.height()){
       $('a.smooth-scroll[href="#materials"]').addClass('active');
     }else{
       $('a.smooth-scroll[href="#materials"]').removeClass('active');
     }
      if(scroll>$sizes.position().top && scroll<$sizes.position().top+$sizes.height()){
       $('a.smooth-scroll[href="#sizes"]').addClass('active');
     }else{
       $('a.smooth-scroll[href="#sizes"]').removeClass('active');
     }
    //console.log(scroll);
     if((scroll>265) ){
         if(!$this.is('.fixed-position')){
             $this.addClass('fixed-position');
         }
         if(scroll+ $(window).height()> (footer_pos + 300)){
             //console.log('bottom');
             $this.css({
                 'bottom': scroll+ $(window).height() - footer_pos +50  +'px'
             });
         }else{
               $this.removeAttr('style');
         }
         
     }else{
          if($this.is('.fixed-position')){
         $this.removeClass('fixed-position');
     }
     }
    });
   //$(this) 
});

    
}

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}

  jQuery(document).ready(function ($) {



//order js

$('#form-order').find('form input[type="submit"]').click(function(e){
  e.preventDefault();
   console.log('submit');
   
   var kod = $('#primary').find('.sku_wrapper .sku').text();
   var title = $('#product-title h1').text();
   var category = $('.order-text .category-order').text();
   var karkas = $('.order-text').find('.var-value-0').text();
   var obbivka = $('.order-text').find('.var-value-5').text();
   var kolichestvo = $('.order-text').find('.count-val').text();
   var sum = $('.order-text').find('.sum-price').text();
   var link = getAbsolutePath();
   
     
   $('.text-101 input').val(kod).attr('value', kod);
   $('.text-102 input').val(title).attr('value', title);
   $('.text-103 input').val(category).attr('value', category);
   $('.text-104 input').val(karkas).attr('value', karkas);
   $('.text-105 input').val(obbivka).attr('value', obbivka);
   $('.text-106 input').val(kolichestvo).attr('value', kolichestvo);
   $('.text-107 input').val(sum).attr('value', sum);
   $('.text-108 input').val(link).attr('value', link);
   console.log($('.text-101 input').val());
   console.log($('.text-102 input').val());
   console.log($('.text-103 input').val());
   console.log($('.text-104 input').val());
   console.log($('.text-105 input').val());
   console.log($('.text-106 input').val());
   console.log($('.text-107 input').val());
   console.log($('.text-108 input').val());
   $('#form-order').find('form').submit();
});

     
      
      
     // console.log('Loaded');
      setTimeout(function(){
          $('#page').removeClass('loading').addClass('load');
          
      },1000);
      
       setTimeout(function(){
          $('#loader').addClass('fade-out');
          $('#page').removeClass('load').addClass('loaded');
      },2000);
      
      
      
      var expert_count=1;
      expert_count = $('.expert-wrapp').find('.expert-item').length;
      var start = 1200000;
      var carousePosition = $('#colophon').offset();
     // console.log(carousePosition.top);
      $(window).scroll(function(){
          var scrollCarousel = $(window).scrollTop();
          
//          if ((scrollCarousel<carousePosition.top+100) ){
//             $('.expert-wrapp').mouseover();
//          }else{
//              
//          }
      });
      
      var $c = $('.expert-wrapp'),
					$w = $(window);

				$c.carouFredSel({
					align: false,
					items: 6,
					scroll: {
						items: 1,
						duration: 10000,
						timeoutDuration: 0,
						easing: 'linear',
						pauseOnHover: 'immediate'
					}
				});

				
				$w.bind('resize.example', function() {
					var nw = $w.width();
					if (nw < 990) {
						nw = 990;
					}

					$c.width(nw * 3);
					$c.parent().width(nw);

				}).trigger('resize.example');



//          $('.expert-wrapp').slick({
//  infinite: true,
//  dots: false,
//  slidesToShow: 3,
//  slidesToScroll: expert_count,
//speed: 20000,
//autoplay: true,
//autoplaySpeed: 1
//
//});

      
      
      var w = $(window).width();
      if(w<767){
         $('.slide-down-wr').find('h3').click(function(){
             
             if($(this).is('.open')){
                 $(this).parents('.slide-down-wr').find('.slide-down-bodt').stop().slideUp(300);
                 $(this).removeClass('open');
             }else{
                 $(this).parents('.slide-down-wr').find('.slide-down-bodt').stop().slideDown(300);
                 $(this).addClass('open');
             }
             
         }) ;
      }
      
      $(window).resize(function(){
                 w = $(window).width();
      if(w<767){
         $('.slide-down-wr').find('h3').unbind().click(function(){
             if($(this).is('.open')){
                 $(this).parents('.slide-down-wr').find('.slide-down-bodt').stop().slideUp(300);
                 $(this).removeClass('open');
             }else{
                 $(this).parents('.slide-down-wr').find('.slide-down-bodt').stop().slideDown(300);
                 $(this).addClass('open');
             }
             
         }) ;
      }else{
          $('.slide-down-wr').find('h3').unbind();
      }
      });
      

        
        
         $('#secondary').find("#filters-wrapp").mCustomScrollbar();
         $('#obzor').find(".dropdown-select-wr").mCustomScrollbar();


slick_slider();
$(window).resize(function(){
 
    slick_slider();
 
});

       $('#home-slider').not('.slick-initialized').slick({
     
  infinite: true,
  dots: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  appendDots:$('.slider-nav'),
  prevArrow: $('.arrow-left'),
  nextArrow: $('.arrow-right'),

});

       $('#project-carousel').not('.slick-initialized').slick({
     
  infinite: false,
  dots: true,
  slidesToShow: 1,
  slidesToScroll: 1,

     prevArrow: '<i class="fa fa-long-arrow-left arrow-left"></i>',
  nextArrow: '<i class="fa fa-long-arrow-right arrow-right"></i>'
    

});

  $('.mfp-inline').magnificPopup({
      type:'inline',
      showCloseBtn:true,
      closeMarkup:'<button title="%title%" type="button" class="mfp-close">&#215;</button>'
  });
  
  $('.mobile-toggle-in').unbind().click(function(e){
      e.preventDefault();
      $('body').addClass('overflow-hidden');
      $('#mobile-menu').fadeIn(0);
  });
  $('.mobile-toggle-out').unbind().click(function(e){
      e.preventDefault();
      $('body').removeClass('overflow-hidden');
      $('#mobile-menu').fadeOut(0);
  });

function slick_slider() {
    
    
    var wrapper = $("#top-footer-promo");
    if (wrapper.is(".slick-initialized")) {
        wrapper.slick('unslick');
    }
    wrapper.slick({
        mobileFirst: true,
        infinite: false,
  dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        responsive: [{
            breakpoint: 480,
            settings: "unslick"
        }]
    });
    
     if ( $('#materials-wr').is(".slick-initialized")) {
         $('#materials-wr').slick('unslick');
    }
    
    
    
 
    
    
    
    
    $('#materials-wr').not('.slick-initialized').slick({
     
  infinite: false,
  dots: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  prevArrow: '<i class="fa fa-long-arrow-left arrow-left"></i>',
  nextArrow: '<i class="fa fa-long-arrow-right arrow-right"></i>',
  responsive: [{
            breakpoint: 991,
            settings: "unslick"
        }]
});

    $('#gallery-imgs').not('.slick-initialized').slick({
     mobileFirst: true,
  infinite: false,
  dots: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  centerMode: true,
  arrows: false,
  responsive: [{
            breakpoint: 767,
            settings: "unslick"
        }]
});
}






$('.product_list_widget').not('.slick-initialized').slick({
  infinite: false,
  dots: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows:true,
    prevArrow: '<i class="fa fa-long-arrow-left arrow-left"></i>',
  nextArrow: '<i class="fa fa-long-arrow-right arrow-right"></i>',
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
  
});
      
      
      
      
$('.expert-wrapp-slick').not('.slick-initialized').slick({
  infinite: false,
  dots: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows:false,
   
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
  
});



$('#sertificats-slick').not('.slick-initialized').slick({
  infinite: false,
  dots: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows:false,
   
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
       {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
  
});
      $('#production-carousel').not('.slick-initialized').slick({
  infinite: false,
  dots: true,
 slidesToShow: 3,
  slidesToScroll: 1,
  arrows:false,
   
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
       {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
  
});
      
//      $('#shop-wrapp').find('.product').each(function(i){
//          
//          var prod_w = $(this).width();
//          $(this).css({
//              'width': prod_w + 'px'
//          });
//      });
//      $(window).resize(function(){
//          $('#shop-wrapp').find('.product').each(function(i){
//          
//          var prod_w = $(this).width();
//          $(this).css({
//              'width': prod_w + 'px'
//          });
//      });
//      });
      $('#filter-swither, #overlay-filter, #close-filter').unbind().click(function(){
        $('#main').toggleClass('closed-f');
        $('#filter-swither').toggleClass('closed-filters');
         if($('#main').is('.closed-f')){
             setTimeout(function(){
                   $('#page').toggleClass('closed-page');
             }, 400);
         }else{
                $('#page').toggleClass('closed-page');
         }
         
         
       
          masonryUpdate( $('.woocommerce-page').find('ul.products'));
      });
      
      
      
      $('.menu-sidebar').find('form label').unbind().click(function(){
       //  console.log('click');
         $(this).parents('.menu-sidebar').toggleClass('open');
      });
      
$('.bottom-widget_text').find('input[name="es_txt_email"]').attr('placeholder', 'Ваш E-mail');
    //"use strict";
    $('.woocommerce-ordering').find('.orderby option').each(function(){
       $(this).removeAttr('selectes'); 
    });
    $('.woocommerce-ordering').find('.orderby').prepend('<option  disabled="disabled"  selected="selected" data-display="Сортировать">Сортировать</option>');
    
    
        $('select').niceSelect();
        $('#secondary').find('.widget-title').each(function(i){
           $(this).addClass('closed');
        });
        
        $('#secondary').find('.widget-title').unbind().click(function(){
            if($(this).is('.closed')){
                $(this).parent().find('ul').slideDown(300); 
                $(this).removeClass('closed');
            }else{
                $(this).parent().find('ul').slideUp(300); 
                $(this).addClass('closed');
            }
           
        });

       var active = [];
             var separator = '';
             
            if($('body').is('.post-type-archive-product')){
                if($('#filters-wrapp').find('.berocket_checked').length>0){
                    var all_filters ='' ;
                }else{
                    var all_filters ='Мебель' ;
                }
                $('#filters-wrapp').find('.berocket_checked').each(function(i){
                   active[i] =  $(this).text();
                if(i!==0){
                    separator = ', ';
                    active[i] = active[i].toLowerCase();
                    
                }
                all_filters+=separator+active[i];
                });
                
                $('.shop-title').text(all_filters);
            }
   var $search  = window.location.search;
              var $path  = window.location.pathname;
            if($path.indexOf('shop') !== -1){
                console.log('shop');
                  if($path.indexOf('page') !== -1){
                      var cur_page = $path.split('/');
                      console.log(cur_page[3]);
                      if($('.page-numbers.current').text() == $('.woocommerce-pagination li:last').text()){
                      console.log('last page');
                      $('.product.load-more').hide();
                      }
                  }
            }
            if($search!=''){
                console.log($search);
            }
        $(document).ajaxComplete(function(){
            var $search  = window.location.search;
              var $path  = window.location.pathname;
               if($path.indexOf('shop') !== -1){
                console.log('shop');
                  if($path.indexOf('page') !== -1){
                      var cur_page = $path.split('/');
                      console.log(cur_page[3]);
                      if($('.page-numbers.current').text() == $('.woocommerce-pagination li:last').text()){
                      console.log('last page');
                      $('.product.load-more').hide();
                      }
                  }
            }
            if($search!=''){
                console.log($search);
                  if($('.page-numbers.current').text() == $('.woocommerce-pagination li:last').text()){
                      console.log('last page');
                      $('.product.load-more').hide();
                      }
                if($search.indexOf('paged=') !== -1){
                    var cur_page2 = $search.split('paged=');
                    if($('.page-numbers.current').text() == cur_page2){
                      console.log('last page');
                      $('.product.load-more').hide();
                      }
                }
                
            }
               // $('.woocommerce-ordering').find('.orderby').prepend('<option disabled="disabled" data-display="Сортировать">Сортировать</option>');

            $('select').niceSelect();
             var active = [];
             var separator = '';
             var all_filters ='' ;
     if($('body').is('.post-type-archive-product')){
                if($('#filters-wrapp').find('.berocket_checked').length>0){
                    var all_filters ='' ;
                }else{
                    var all_filters ='Мебель' ;
                }
                $('#filters-wrapp').find('.berocket_checked').each(function(i){
                   active[i] =  $(this).text();
                if(i!==0){
                    separator = ', ';
                    active[i] = active[i].toLowerCase();
                    
                }
                all_filters+=separator+active[i];
                });
                
                $('.shop-title').text(all_filters);
            }
            
        });
        
$(window).load(function(){
  
//  var win_wid = $(window).width();
//  
//  if($('body').is('.home') && win_wid<1200){
//    
//    $('.home-video').find('.video-start').clone().appendTo('#home-slider .textwidget a');
//  }
//  

$('.image-link').magnificPopup({type:'image'});
    
    var $tabs = '<div class="col-lg-12"><ul id="tabs-ul">';
    $('#top-footer-block').find('.widget').each(function(i){
        
        $(this).attr('data-id', i);
        var cl = '';
        if(i==0){
            cl = 'active'; 
        }
        $tabs += '<li id="item-'+i+'" data-id="'+i+'" class="tabs-li '+cl+'">'+$(this).find('.widget-title').text()+'</li>';
        
    });
    $tabs+='</ul></div>';
    $('#top-footer-block').prepend($tabs);
    
$('#tabs-ul').find('li').unbind().click(function(e){
    e.preventDefault();
    var $this = $(this);
    var $id= $(this).attr('data-id');
    $('#tabs-ul').find('li').removeClass('active');
    $('#top-footer-block').find('.widget').fadeOut(0);
    $this.addClass('active');
     $('#top-footer-block').find('.widget[data-id="'+$id+'"]').fadeIn(0);
    
});

$('#rooms-wrapp .widget').each(function(i){
    $(this).find('.widget-title').attr('data-count', i);
});

$('#maps-wrapp .widget').each(function(i){
    $(this).attr('data-count', i);
 });

$('#rooms-wrapp .widget-title').unbind().click(function(e){
    e.preventDefault();
    var $text = $(this).parent().find('.textwidget');
    var $count = $(this).attr('data-count');
    
    if($text.is(":visible")){
        console.log('visible');
    }else{
        $('#rooms-wrapp .widget-title').removeClass('not-linked').addClass('linked');
        $(this).addClass('not-linked').removeClass('linked');
        $('#rooms-wrapp').find('.textwidget').slideUp(300);
        $text.slideDown(300);
        
        $('#maps-wrapp .widget').each(function(){
            $(this).css({
               'z-index': '1' 
            });
        });
        
        $('#maps-wrapp .widget[data-count="'+$count+'"]').css({
               'z-index': '10' 
            });
        console.log('hidden');
    }
});



    
    $('.dropdown-select-inner').each(function(i){
        $(this).find('.swatch:first-of-type').click();
        var v = $(this).find('.swatch:first-of-type').text();
        $(this).parents('.label').append('<span class="val-val">'+v+'</span>');
    });
    
    $('.variation-selector').find('select').change(function(){
       var sel = $(this).find('option:selected').text();
       //console.log(sel);
       $(this).parents('.label').find('.val-val').text(sel);
    });
    
    
    $('.variations-dropdown').find('label').unbind().click(function(){
        $(this).parent().find('.value').addClass('slide-in');
        $('body').addClass('popup-open');
        $('#product-outer').addClass('open-bar');
    });
    
 
    $('.slide-bg, .close-btn').click(function(){
        $('.variations-dropdown .value').removeClass('slide-in');
        $('.order-popup').find('.value').removeClass('slide-in');
        $('body').removeClass('popup-open');
        $('#product-outer').addClass('close-bar');
    });
    
    
    
    
      $('a.smooth-scroll').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[href=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top-70
        }, 1000);
        return false;
      }
    }
  });
  
  if(window.location.hash!='' && window.location.hash!='undefined' && window.location.hash!=null){
    console.log(window.location.hash);
       $('html,body').animate({
          scrollTop: $(window.location.hash).offset().top-70
        }, 1000);
  }else{
    // console.log('sssss');
  }
  
      $('#gallery-imgs').masonry({
  // options
  itemSelector: '.mans-grid',
  columnWidth: 1,
  resize:true 
});
//      $('.monsonry-container').masonry({
//  // options
//  itemSelector: '.project-post',
//  columnWidth: '.get-sizer',
//  resize:true 
//});

//    $('#categories-wr ul').masonry({
//  // options
//  itemSelector: 'li',
//  columnWidth: 1,
//  resize:true 
//});

 $('.woocommerce-page').find('ul.products').masonry({
  // options
  itemSelector: 'li.product',
  columnWidth: 1,
  resize:true 
});





init();

   $('.type-product').find('.add-to-cart').click(function(e){
      e.preventDefault();
      // console.log('CLICK');
          
  
  // console.log('PRODUCT');
  $('.order-text').find('.order-var-item').html('');
  var $img= $('#main-image').find('img').clone();
  $('.order-img .img-wr').html($img);
   var $title = $('#product-title h1').text();
   var $cat = $('.posted_in').find('a').text();
   
   var $price = $('.single_variation_wrap .woocommerce-variation-price .price .amount .amount').text().replace(' ', '');
   $price =parseInt($price);
   var $vars_label = [];
   var $vars_val = [];
   $('ul.variations-dropdown').find('li').each(function(i){
     $vars_label[i]=$(this).find('label').text();
     $vars_val[i]=$(this).find('.val-val').text();
     $('.order-text').find('.order-var-item').append('<span class="row-srtap"><span class="karkas-order">'+$vars_label[i]+'</span><span class="var-value var-value-'+i+'">'+$vars_val[i]+'</span></span>');
   });
   $('.order-text').find('h4').text($title);
   $('.order-text').find('.category-order').text($cat);
   $('.order-text').find('.price-val').text($price);
   $('.order-text').find('.sum-price span').text($price);
   //$('.order-text').find('h4').text($title);


$('.form-item-tel').find('input').mask('+38 (000) 000-00-00', {placeholder: "+38 (___) ___-__-__"});
      
      $('.counter-order').find('div').unbind().click(function(){
         var $btn = $(this);
         var $btnClass = $(this).attr('class');
         var $count = $('.counter-order').find('div.count-val').text();
         
         var $sum = (+$price);
         $count = (+$count);
         if($btnClass==='plus'){
           $count=$count+1;
          console.log($count);
         }
         
         if($btnClass==='minus'){
           if($count>1){
             $count=$count-1; 
           }
                    
         }
         $sum = $price*$count;
         $('.sum-price').find('.num-val').text($sum);
          $('.counter-order').find('div.count-val').text($count);
          
      });
      $('.sum-price').find('.num-val').mask('000 000 000 000');
//=============================
       $('.order-popup').find('.value').addClass('slide-in');
       $('body').addClass('popup-open');
        $('#product-outer').addClass('open-bar');
  });
  
   
});


$(document).ajaxComplete(function(){
    console.log('Ajax complete');
    
    init();
    masonryReload( $('.woocommerce-page').find('ul.products'));
  //  masonryReloadProj( $('.monsonry-container'));
});



    jQuery('body').imagesLoaded(function () {
      jQuery(window).trigger('resize').trigger('scroll');
    });

    jQuery('.shapely-dropdown').click(function (evt) {
      evt.preventDefault();
      jQuery(this).parent().find('> ul').toggleClass('active');
      jQuery(window).trigger('resize').trigger('scroll');
    });

    // Smooth scroll to inner links
    jQuery('.inner-link').each(function () {
      let href = jQuery(this).attr('href');
      if ('#' !== href.charAt(0)) {
        jQuery(this).removeClass('inner-link');
      }
    });

    // Smooth scroll
    if ('' !== window.location.hash) {
      element = $('#site-navigation #menu a[href=' + window.location.hash + ']');
      if (element) {
        scrollToID = '#' + element.data('scroll');

        if (jQuery(scrollToID).length > 1) {
          scrollToID = window.location.hash;
        }

        if (jQuery(scrollToID).length < 1) {
          return;
        }

        $('html,body').animate({
          scrollTop: $(scrollToID).offset().top
        }, 2000);

        newURL = window.location.href.replace(window.location.hash, '');
        window.history.replaceState({}, document.title, newURL);
      } else {
        return;
      }
    }

    $('#site-navigation #menu a[href^=#]:not([href=#])').click(function (evt) {
      let scrollToID = '#' + $(this).data('scroll');

      if (jQuery(scrollToID).length > 1) {
        scrollToID = $(this).attr('href');
      }

      if (jQuery(scrollToID).length < 1) {
        return;
      }

      evt.preventDefault();
      $('html,body').animate({
        scrollTop: $(scrollToID).offset().top
      }, 2000);
    });

    jQuery('.inner-link').click(function () {
      jQuery('html, body').animate({
        scrollTop: 0
      }, 500);
      return false;
    });

    // Append .background-image-holder <img>'s as CSS backgrounds

    jQuery('.background-image-holder').each(function () {
      let imgSrc = jQuery(this).children('img').attr('src');
      jQuery(this).css('background', 'url("' + imgSrc + '")');
      jQuery(this).children('img').hide();
      jQuery(this).css('background-position', 'initial');
    });

    // Fade in background images

    setTimeout(function () {
      jQuery('.background-image-holder').each(function () {
        jQuery(this).addClass('fadeIn');
      });
    }, 200);

    if ('1' === ShapelyAdminObject.sticky_header) {

      // Fix nav to top while scrolling
      clNav = $('body .nav-container nav:first');
      clNavOuterHeight = $('body .nav-container nav:first').outerHeight();
      windowW = jQuery(window).width();
      if (windowW > 991) {
        window.addEventListener('scroll', updateNav, false);
        updateNav();
      }

      $(window).resize(function () {
        windowW = $(window).width();
        if (windowW < 992) {
          clNav.removeClass('fixed scrolled outOfSight');
        } else {
          window.addEventListener('scroll', updateNav, false);
          updateNav();
        }
      });
    }

    // Menu dropdown positioning

    $('.menu > li > ul').each(function () {
      menu = $(this).offset();
      farRight = menu.left + $(this).outerWidth(true);
      if (farRight > $(window).width() && !$(this).hasClass('mega-menu')) {
        $(this).addClass('make-right');
      } else if (farRight > $(window).width() && $(this).hasClass('mega-menu')) {
        isOnScreen = $(window).width() - menu.left;
        difference = $(this).outerWidth(true) - isOnScreen;
        $(this).css('margin-left', -(difference));
      }
    });

    // Mobile Menu

    $('.mobile-toggle').click(function () {
      $('.nav-bar').toggleClass('nav-open');
      $(this).toggleClass('active');
      $('.search-widget-handle').toggleClass('hidden-xs hidden-sm');
      jQuery(window).trigger('resize').trigger('scroll');
    });

    $('.module.widget-handle').click(function () {
      $(this).toggleClass('toggle-search');
      jQuery(window).trigger('resize').trigger('scroll');
    });

    $('.search-widget-handle .search-form input').click(function (e) {
      if (!e) {
        e = window.event;
      }
      e.stopPropagation();
    });

    // Image Sliders
    $('.slider-all-controls').flexslider({
      start: function (slider) {
        if (slider.find('.slides li:first-child').find('.fs-vid-background video').length) {
          slider.find('.slides li:first-child').find('.fs-vid-background video').get(0).play();
        }
      },
      after: function (slider) {
        if (slider.find('.fs-vid-background video').length) {
          if (slider.find('li:not(.flex-active-slide)').find('.fs-vid-background video').length) {
            slider.find('li:not(.flex-active-slide)').find('.fs-vid-background video').get(0).pause();
          }
          if (slider.find('.flex-active-slide').find('.fs-vid-background video').length) {
            slider.find('.flex-active-slide').find('.fs-vid-background video').get(0).play();
          }
        }
      }
    });
    $('.slider-paging-controls').flexslider({
      animation: 'slide',
      directionNav: false,
      after: function (slider) {
        if (!slider.playing) {
          slider.pause();
          slider.play();
          slider.off('mouseenter mouseleave');
          slider.off('mouseover mouseout');
          slider.mouseover(function () {
            if (!slider.manualPlay && !slider.manualPause) {
              slider.pause();
            }
          }).mouseout(function () {
            if (!slider.manualPause && !slider.manualPlay && !slider.stopped) {
              slider.play();
            }
          });
        }
      }
    });
    $('.slider-arrow-controls').flexslider({
      controlNav: false,
      after: function (slider) {
        if (!slider.playing) {
          slider.pause();
          slider.play();
          slider.off('mouseenter mouseleave');
          slider.off('mouseover mouseout');
          slider.mouseover(function () {
            if (!slider.manualPlay && !slider.manualPause) {
              slider.pause();
            }
          }).mouseout(function () {
            if (!slider.manualPause && !slider.manualPlay && !slider.stopped) {
              slider.play();
            }
          });
        }
      }
    });
    $('.slider-thumb-controls .slides li').each(function () {
      let imgSrc = $(this).find('img').attr('src');
      $(this).attr('data-thumb', imgSrc);
    });
    $('.slider-thumb-controls').flexslider({
      animation: 'slide',
      controlNav: 'thumbnails',
      directionNav: true,
      after: function (slider) {
        if (!slider.playing) {
          slider.pause();
          slider.play();
          slider.off('mouseenter mouseleave');
          slider.off('mouseover mouseout');
          slider.mouseover(function () {
            if (!slider.manualPlay && !slider.manualPause) {
              slider.pause();
            }
          }).mouseout(function () {
            if (!slider.manualPause && !slider.manualPlay && !slider.stopped) {
              slider.play();
            }
          });
        }
      }
    });
    $('.logo-carousel').flexslider({
      minItems: 1,
      maxItems: 4,
      move: 1,
      itemWidth: 200,
      itemMargin: 0,
      animation: 'slide',
      slideshow: true,
      slideshowSpeed: 3000,
      directionNav: false,
      controlNav: false,
      after: function (slider) {
        if (!slider.playing) {
          slider.pause();
          slider.play();
          slider.off('mouseenter mouseleave');
          slider.off('mouseover mouseout');
          slider.mouseover(function () {
            if (!slider.manualPlay && !slider.manualPause) {
              slider.pause();
            }
          }).mouseout(function () {
            if (!slider.manualPause && !slider.manualPlay && !slider.stopped) {
              slider.play();
            }
          });
        }
      }
    });

    // Lightbox gallery titles
    $('.lightbox-grid li a').each(function () {
      let galleryTitle = $(this).closest('.lightbox-grid').attr('data-gallery-title');
      $(this).attr('data-lightbox', galleryTitle);
    });

    videos = $('.video-widget');
    if (videos.length) {
      $.each(videos, function () {
        let play = $(this).find('.play-button'),
          pause = $(this).find('.pause-button'),
          isYoutube = $(this).hasClass('youtube'),
          isVimeo = $(this).hasClass('vimeo'),
          videoId, mute, instance, self, autoplay, data, options, containerId, player;

        if (isYoutube) {
          videoId = $(this).attr('data-video-id');
          autoplay = parseInt($(this).attr('data-autoplay'), 10);
          mute = parseInt($(this).attr('data-mute'), 10);
          instance = $(this).YTPlayer({
            fitToBackground: true,
            videoId: videoId,
            mute: mute,
            playerlets: {
              modestbranding: 0,
              autoplay: autoplay,
              controls: 0,
              showinfo: 0,
              branding: 0,
              rel: 0,
              autohide: 0
            }
          });
          self = $(this);

          $(document).on('YTBGREADY', function () {
            let iframe = self.find('iframe'),
              height = iframe.height();
          });

          $(play).on('click', function (e) {
            let parent = $(this).parents('.video-widget'),
              instance = $(parent).data('ytPlayer').player;
            e.preventDefault();
            instance.playVideo();
          });

          $(pause).on('click', function (e) {
            let parent = $(this).parents('.video-widget'),
              instance = $(parent).data('ytPlayer').player;
            e.preventDefault();
            instance.pauseVideo();
          });

        } else if (isVimeo) {

          data = jQuery(this).data();
          options = {
            id: data.videoId,
            autoplay: data.autoplay,
            loop: 1,
            title: false,
            portrait: false,
            byline: false,
            height: jQuery(this).height(),
            width: jQuery(this).width()
          };
          containerId = jQuery(this).find('.vimeo-holder').attr('id');
          player = new Vimeo.Player(containerId, options);

          if (data.mute) {
            player.setVolume(0);
          }

          jQuery(play).click(function () {
            player.play();
          });
          jQuery(pause).click(function () {
            player.pause();
          });

        } else {

          $(play).on('click', function (e) {
            let parent = $(this).parents('.video-widget'),
              instance = $(parent).data('vide'),
              video = instance.getVideoObject();
            e.preventDefault();
            video.play();
          });

          $(pause).on('click', function (e) {
            let parent = $(this).parents('.video-widget'),
              instance = $(parent).data('vide'),
              video = instance.getVideoObject();
            e.preventDefault();
            video.pause();
          });
        }
      });
    }

    recentEntries = $('.widget_recent_entries').find('li');
    $.each(recentEntries, function () {
      $(this).find('a').insertAfter($(this).find('.post-date'));
    });

    $('.comment-form').find('textarea').insertAfter($('.comment-form > #url'));

    if ('undefined' !== typeof $.fn.owlCarousel) {

      $('.owlCarousel').each(function (index) {

        let sliderSelector = '#owlCarousel-' + $(this).data('slider-id'); // This is the slider selector
        let sliderItems = $(this).data('slider-items');
        let sliderSpeed = $(this).data('slider-speed');
        let sliderAutoPlay = $(this).data('slider-auto-play');
        let sliderSingleItem = $(this).data('slider-single-item');

        //Conversion of 1 to true & 0 to false
        // auto play
        sliderAutoPlay = !(0 === sliderAutoPlay || 'false' === sliderAutoPlay);

        // Custom Navigation events outside of the owlCarousel mark-up
        $('.shapely-owl-next').on('click', function (event) {
          event.preventDefault();
          $(sliderSelector).trigger('next.owl.carousel');
        });
        $('.shapely-owl-prev').on('click', function (event) {
          event.preventDefault();
          $(sliderSelector).trigger('prev.owl.carousel');
        });

        // Instantiate the slider with all the options
        $(sliderSelector).owlCarousel({
          items: sliderItems,
          loop: false,
          margin: 2,
          autoplay: sliderAutoPlay,
          dots: false,
          autoplayTimeout: sliderSpeed * 10,
          responsive: {
            0: {
              items: 1
            },
            768: {
              items: sliderItems
            }
          }
        });
      });
    } // End

    jQuery('#masthead .function #s').focus(function () {
      jQuery(this).parents('.function').addClass('active');
    });

    jQuery('#masthead .function #s').focusout(function () {
      searchInterval = setInterval(function () {
        jQuery('#masthead .function').removeClass('active');
      }, 500);
    });

    jQuery('#masthead .function #searchsubmit').focus(function () {
      clearInterval(searchInterval);
      jQuery(this).parents('.function').addClass('active');
    });

    jQuery('#masthead .function #searchsubmit').focusout(function () {
      jQuery(this).parents('.function').removeClass('active');
    });

    // Check if is a contact form 7 with parallax background
    shapelyCf = jQuery('.contact-section.image-bg .wpcf7');
    if (shapelyCf.length > 0) {
      shapelyCf.on('wpcf7submit', function () {
        setTimeout(function () {
          jQuery(window).trigger('resize').trigger('scroll');
        }, 800);
      });
    }

  });

  jQuery(window).load(function ($) {

    // "use strict";
    // Resetting testimonial parallax height
    let msnry, container, clFirstSectionHeight;
    if (0 !== jQuery('.testimonial-section').length) {
      testimonialHeight();
      setTimeout(function () {
        testimonialHeight();
      }, 3000);
    }

    // Initialize Masonry

    if (jQuery('.masonry').length && 'undefined' !== typeof Masonry) {
      container = document.querySelector('.masonry');
      msnry = new Masonry(container, {
        itemSelector: '.masonry-item'
      });

      msnry.on('layoutComplete', function ($) {

        clFirstSectionHeight = jQuery('.main-container section:nth-of-type(1)').outerHeight(true);
        jQuery('.masonry').addClass('fadeIn');
        jQuery('.masonry-loader').addClass('fadeOut');
        if (jQuery('.masonryFlyIn').length) {
          masonryFlyIn();
        }
      });

      msnry.layout();
    }

    // Navigation height
    clFirstSectionHeight = jQuery('.main-container section:nth-of-type(1)').outerHeight(true);

  });

  /* Function To
   * keep menu fixed
   **/
  function updateNav() {
    let scroll = $(window).scrollTop();
    let windowW = jQuery(window).width();

    if (windowW < 992) {
      return;
    }

    if (scroll > clNavOuterHeight) {
      clNav.addClass('outOfSight');
    }

    if ($(window).scrollTop() > (clNavOuterHeight + 65)) {//If href = #element id
      clNav.addClass('fixed scrolled');
    }

    if (0 === $(window).scrollTop()) {
      clNav.removeClass('fixed scrolled outOfSight');
    }
  }

  function masonryFlyIn() {
    let $items = jQuery('.masonryFlyIn .masonry-item');
    let time = 0;

    $items.each(function () {
      let item = jQuery(this);
      setTimeout(function () {
        item.addClass('fadeIn');
      }, time);
      time += 170;
    });
  }

  jQuery('body').imagesLoaded(function () {
    jQuery(window).trigger('resize').trigger('scroll');
  });

})(jQuery);

/*
 * Resetting testimonial parallax height
 */
function testimonialHeight() {
  jQuery('.testimonial-section .parallax-window').css('height', jQuery('.testimonial-section .parallax-window .container').outerHeight() + 150);
  jQuery(window).trigger('resize').trigger('scroll');
}
