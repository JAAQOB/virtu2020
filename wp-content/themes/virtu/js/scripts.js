(function ($, root, undefined) {

	$(function () {
        /* SLIDERY */
        if(document.querySelector('.homepage-top-slider')){
            var homepageTopSlider = new Swiper('.homepage-top-slider .swiper-container', {
                navigation: {
                nextEl: '.homepage-top-slider .swiper-navigation__next',
                prevEl: '.homepage-top-slider .swiper-navigation__prev',
                },
                pagination: {
                el: '.homepage-top-slider .swiper-navigation__pagination'
                },
            });
        }
		$(document).ready(function () {
		});
        var lazyLoadFn = function () {
            $('.lazy').Lazy({
                effect: 'fadeIn',
                delay: 0,
                visibleOnly: false,
                scrollDirection: 'horizontal',
                autoDestroy: true,
                afterLoad: function (element) {
                  $(element).removeClass('lazy-loading lazy');
                },
                onFinishedAll: function () {
                  $('.lazy-loading').removeClass('lazy-loading lazy');
                    if (window.location.hash) {
                        var hash = window.location.hash;
                        var el = document.querySelector(hash);
                        if (el) {
                            el.scrollIntoView({behavior: "smooth"});
                        }
                    }
                }
            });
          };

        window.addEventListener('load', function () {
            lazyLoadFn();
        });

        /*********************************************
        ** FLOATING LABELS FOR CF7
        *********************************************/
        $(".wpcf7 .form-control").focus(function(){
            $(this).parent().parent().addClass('active');
        }).blur(function(){
            var cval = $(this).val()
            if(cval.length < 1) {$(this).parent().parent().removeClass('active');}
        })




        const $contactInput = $('.form-control');
        var observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
              if (mutation.attributeName === "class") {
                var notValidInput = $(mutation.target);

                if(notValidInput.hasClass('wpcf7-not-valid')){
                    notValidInput.parent().parent().addClass('not-valid-error');
                } else{
                    notValidInput.parent().parent().removeClass('not-valid-error');
                }

              }
            });
          });

	});

})(jQuery, this);


