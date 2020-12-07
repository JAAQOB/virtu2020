(function ($, root, undefined) {

	$(function () {
        /* SLIDERY */
            if(document.querySelector('.homepage-top-slider')){
                var homepageTopSlider = new Swiper('.homepage-top-slider .swiper-container', {
                    navigation: {
                    nextEl: '.homepage-top-slider .swiper-button-next-custom',
                    prevEl: '.homepage-top-slider .swiper-button-prev-custom',
                    },
                    pagination: {
                    el: '.homepage-top-slider .swiper-pagination'
                    },
                    autoplay: {
                        delay: 5000,
                      },
                });
            }

            if(document.querySelector('.single-product')){
                var homepageTopSlider = new Swiper('.single-product .swiper-container', {
                    navigation: {
                    nextEl: '.single-product .swiper-navigation__next',
                    prevEl: '.single-product .swiper-navigation__prev',
                    },
                });
            }


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
        $(".form-control").focus(function(){
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


           var modal = $("#myModal");

            var clickContent = $('.about-us-certificates .icon-section');
            var modalImg = $(".modal-content");

            clickContent.on('click', function(){
                modal.css("display", "block");

                var dataId = $(this).find("img").attr('id');
                var img = $("#"+dataId);

                modalImg.attr("src", $(img).attr('src'));
            });

            var span = $(".close");
                span.on('click', function(){
                modal.css("display", "none");
            });


            $('.product-template__filters--toggle').on('click', function() {
                $('#product-template__filters-ctr').toggle();
            });
            $('.product-template__filters--clear').on('click', function() {
                location.reload();
            });

            $('.product-template__filters-ctr').on('change','input[type=checkbox]', function() {
                let obj = {};
                let product_calorie_inputs = {
                    product_calorie_input_left: '',
                    product_calorie_input_right: '',
                }
                $('input.product-template__filters-input').each(function() {
                    var name = this.name;
                    if(!obj[name]){
                        obj[name] = {
                            data: []
                        };
                    }
                });

                $('input.product-template__filters-input:checked').each(function() {
                    var name = this.name;
                    var sub_obj = obj[name];
                    sub_obj.data.push(this.value);
                    if(name==='product_calorie'){
                        product_calorie_inputs.product_calorie_input_left = $('#input-product_calorie-left').val();
                        product_calorie_inputs.product_calorie_input_right = $('#input-product_calorie-right').val();
                        console.log(product_calorie_inputs);
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/wp-admin/admin-ajax.php",
                    data: {
                        action: 'products_page_filters',
                        product_types: obj['product_types'].data,
                        product_dish_type: obj['product_dish_type'].data,
                        product_categories: obj['product_categories'].data,
                        product_occasions: obj['product_occasions'].data,
                    },
                    success: function (response) {
                      console.log(response.data.success_msg);
                      var parsedJSON = JSON.parse(response.data.success_data);
                      $(".product-template___ctr").html(parsedJSON);
                    },
                    error: function (response) {
                      console.log(response.data.error_msg);
                      var parsedJSON = JSON.parse(response.data.error_data);
                      //$(".portfolio-template__project-content").html(parsedJSON);
                    }
                });
  
            });


	});

})(jQuery, this);

let lastScrollpos = window.pageYOffset;
let menuButtonCheck = document.querySelector(".menu-btn");
window.onscroll = function() {
	let currentScrollPos = window.pageYOffset;
	if (lastScrollpos > currentScrollPos) {
		document.getElementById("top-nav").style.top = "0";
	} else {
		document.getElementById("top-nav").style.top = "-75px";
	}
	lastScrollpos = currentScrollPos;
	menuButtonCheck.checked = false;
}




var inputLeft = document.getElementById("input-product_calorie-left");
var inputRight = document.getElementById("input-product_calorie-right");

var thumbLeft = document.querySelector(".slider > .thumb.left");
var thumbRight = document.querySelector(".slider > .thumb.right");
var range = document.querySelector(".slider > .range");

var thumbLeftValue = document.querySelector(".slider__thumb-left-value");
var thumbRightValue  = document.querySelector(".slider__thumb-right-value");

function setLeftValue() {
	var _this = inputLeft,
		min = parseInt(_this.min),
        max = parseInt(_this.max);

	_this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - _this.step);

    var percent = ((_this.value - min) / (max - min)) * 100;

    thumbLeftValue.innerHTML = _this.value;

	thumbLeft.style.left = percent + "%";
	range.style.left = percent + "%";
}
setLeftValue();

function setRightValue() {
	var _this = inputRight,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

    thumbRightValue.innerHTML = _this.value;

	thumbRight.style.right = (100 - percent) + "%";
	range.style.right = (100 - percent) + "%";
}
setRightValue();

inputLeft.addEventListener("input", setLeftValue);
inputRight.addEventListener("input", setRightValue);

