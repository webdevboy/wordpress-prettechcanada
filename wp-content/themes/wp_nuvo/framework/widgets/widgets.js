(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        var display;
        var no_display;
        $('body').click(function (e) {
            var target = $(e.target);
            if (target.parents('.shopping_cart_dropdown').length == 0 && !target.hasClass('shopping_cart_dropdown')) {
                $('.widget_searchform_content,.shopping_cart_dropdown').removeClass('active');
            }
        });
        $('.widget_searchform_content,.shopping_cart_dropdown').click(function (e) {
            e.stopPropagation();
        });
       $('.widget_cart_search_wrap [data-display]').click(function (e) {
            var container = $(this).parents('.widget_cart_search_wrap');
            console.log(container);
            e.stopPropagation();
            var _this = $(this);
            display = _this.attr('data-display');
            no_display = _this.attr('data-no_display');
            if ($(display, container).hasClass('active')) {
                $(display, container).removeClass('active');
            } else {
                $(display, container).addClass('active');
                setTimeout(function () {
                    var offset = $(display).offset().left + $(display).outerWidth() - $(window).width()
                    if (offset > 0) {
                        $(display).css({
                            left: 0 - offset
                        });
                    } else {
                        $(display).css({
                            left: 0
                        });

                    }
                }, 10);
                $(no_display, container).removeClass('active');
                /* $(display).css({
                    left: 0
                }); */
            }
        });
        $(window).scroll(function () {
            $('.widget_searchform_content,.shopping_cart_dropdown').each(function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
            })
        })
        //Scroll on cart
        setTimeout(function () {
            $('.shopping_cart_dropdown_inner').css({
                maxHeight: '300px',
                overflow: 'hidden'
            }).bind('mousewheel', function (event) {
                event.preventDefault();
                var scrollTop = this.scrollTop;
                this.scrollTop = (scrollTop + ((event.deltaY * event.deltaFactor) * -1));
            });
        }, 1000);
        /*
        $('.shopping_cart_dropdown_inner').hide().css({maxHeight:'300px'}).bind('mousewheel', function (event) {
            event.preventDefault();
            var scrollTop = this.scrollTop;
            this.scrollTop = (scrollTop + ((event.deltaY * event.deltaFactor) * -1));
        });
        */
    })
})(jQuery);
