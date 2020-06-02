/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'underscore',
    'matchMedia',
    'Magento_PageBuilder/js/utils/breakpoints',
    'Magento_PageBuilder/js/events',
    'slick'
], function ($, _, mediaCheck, breakpointsUtils, events) {
    'use strict';

    /**
     * Initialize slider.
     *
     * @param {jQuery} $carouselElement
     * @param {Object} config
     */
    function buildSlick($carouselElement, config) {
        /**
         * Prevent each slick slider from being initialized more than once which could throw an error.
         */
        if ($carouselElement.hasClass('slick-initialized')) {
            $carouselElement.slick('unslick');
        }

        config.slidesToScroll = config.slidesToShow;
        $carouselElement.slick(config);
    }

    return function (config, element) {
        var $element = $(element),
            $carouselElement = $($element.children()),
            productCount = $(element).find('.product-item').length,
            centerModeClass = 'center-mode',
            carouselMode = $element.data('carousel-mode'),
            slickConfig = {
                autoplay: $element.data('autoplay'),
                autoplaySpeed: $element.data('autoplay-speed') || 0,
                arrows: $element.data('show-arrows'),
                dots: $element.data('show-dots')
            },
            userConfig = {
                "desktop" : {
                    condition: '(min-width: 1024px)',
                    slidesToShow: $element.data('slides-to-show-desktop')
                },
                "tablet" : {
                    condition: '(min-width: 768px) and (max-width: 1024px)',
                    slidesToShow: $element.data('slides-to-show-tablet')
                },
                "mobile" : {
                    condition: '(min-width: 0px) and (max-width: 768px)',
                    slidesToShow: $element.data('slides-to-show-mobile')
                }
            }

        _.each(userConfig, function (breakpoint) {
            mediaCheck({
                media: breakpoint.condition,

                /** @inheritdoc */
                entry: function () {
                    var slidesToShow = breakpoint.slidesToShow;

                    slickConfig.slidesToShow = parseFloat(slidesToShow);

                    if (carouselMode === 'continuous' && productCount > slickConfig.slidesToShow) {
                        $element.addClass(centerModeClass);
                        slickConfig.centerPadding = $element.data('center-padding');
                        slickConfig.centerMode = true;
                    } else {
                        $element.removeClass(centerModeClass);
                        slickConfig.infinite = $element.data('infinite-loop');
                    }

                    buildSlick($carouselElement, slickConfig);
                }
            });
        });

        // Redraw slide after content type gets redrawn
        events.on('contentType:redrawAfter', function (args) {
            if ($carouselElement.closest(args.element).length) {
                $carouselElement.slick('setPosition');
            }
        });
    };
});
