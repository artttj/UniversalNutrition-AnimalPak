define([
    'jquery',
    'Magento_PageBuilder/js/events',
    'slick',
    'SomethingDigital_PageBuilderCustomizations/js/breakpoints',
    'matchMedia'
], function ($, events, slick, breakpoints, mediaCheck) {
    'use strict';

    return function (config, sliderElement) {
        var $element = $(sliderElement);

        /**
         * Prevent each slick slider from being initialized more than once which could throw an error.
         */
        if ($element.hasClass('slick-initialized')) {
            $element.slick('unslick');
        }

        var settings = {
            autoplay: $element.data('autoplay'),
            autoplaySpeed: $element.data('autoplay-speed') || 0,
            fade: $element.data('fade'),
            infinite: $element.data('is-infinite'),
            arrows: $element.data('show-arrows'),
            dots: $element.data('show-dots')
        };
        $element.slick(settings);

        if ($element.data('mobile-only')) {
            mediaCheck({
                media: '(min-width: ' + (breakpoints.screen__m + 1) + 'px)',
                entry: function () {
                    if ($element.hasClass('slick-initialized')) {
                        $element.slick('unslick');
                        $element.show();
                    }
                },
                exit: function () {
                    if (!$element.hasClass('slick-initialized')) {
                        return $element.slick(settings);
                    }
                }
            });
        }

        // Redraw slide after content type gets redrawn
        events.on('contentType:redrawAfter', function (args) {
            if ($element.closest(args.element).length) {
                $element.slick('setPosition');
            }
        });
    };
});
