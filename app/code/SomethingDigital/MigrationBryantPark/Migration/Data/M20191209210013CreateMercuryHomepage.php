<?php

namespace SomethingDigital\MigrationBryantPark\Migration\Data;

use Magento\Framework\Setup\SetupInterface;
use SomethingDigital\Migration\Api\MigrationInterface;
use SomethingDigital\Migration\Helper\Cms\Page as PageHelper;
use SomethingDigital\Migration\Helper\Cms\Block as BlockHelper;
use SomethingDigital\Migration\Helper\Email\Template as EmailHelper;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;

class M20191209210013CreateMercuryHomepage implements MigrationInterface
{
    protected $page;
    protected $block;
    protected $email;
    protected $resourceConfig;

    public function __construct(PageHelper $page, BlockHelper $block, EmailHelper $email, ResourceConfig $resourceConfig)
    {
        $this->page = $page;
        $this->block = $block;
        $this->email = $email;
        $this->resourceConfig = $resourceConfig;
    }

    public function execute(SetupInterface $setup)
    {
        $this->page->create('mercury_homepage', 'Mercury Homepage', `
            <div data-content-type="row" data-appearance="contained" data-element="main">
                <div class="homepage-hero" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}"
                    data-element="inner"
                    style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; border-style: none; border-width: 1px; border-radius: 0px;">
                    <div data-content-type="banner" data-appearance="collage-left" data-show-button="always" data-show-overlay="never"
                    data-fullbleed="1" data-element="main">
                    <div class="pagebuilder-wrapper fullbleed"><a
                        href="{{widget type='Magento\Catalog\Block\Category\Widget\Link' id_path='category/3' template='Magento_PageBuilder::widget/link_href.phtml' type_name='Catalog Category Link' }}"
                        target="" data-link-type="category" data-element="link">
                        <div class="pagebuilder-banner-wrapper"
                            data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/Hero_2.jpg}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/Hero_m.jpg}}\&quot;}"
                            data-element="wrapper"
                            style="background-position: center center; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; min-height: 600px;">
                            <div class="layout_wrapper" data-element="layout_wrapper"
                            style="justify-content: center; display: flex; flex-direction: column;">
                            <div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay"
                                style="background-color: transparent;">
                                <div class="pagebuilder-collage-content">
                                <div data-element="content">
                                    <div>
                                    <div>
                                        <div>
                                        <div>
                                            <div><span style="font-size: 34px; color: #ffffff;">Discover Our Timeless Collection.</span>
                                            </div>
                                            <div><span style="font-size: 20px; color: #ffffff;">Artfully crafted with luxurious
                                                details.</span></div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div><button type="button" class="pagebuilder-banner-button pagebuilder-button-primary"
                                    data-element="button" style="opacity: 1; visibility: visible;">Shop Now</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </a></div>
                    </div>
                </div>
                </div>
                <div data-content-type="row" data-appearance="contained" data-element="main">
                <div class="homepage-hero-text mobile-only" data-enable-parallax="0" data-parallax-speed="0.5"
                    data-background-images="{}" data-element="inner"
                    style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px;">
                    <h2 data-content-type="heading" data-appearance="default" data-element="main"
                    style="text-align: center; border-style: none; border-width: 1px; border-radius: 0px;">



                    Discover Our Timeless Collection.</h2>
                    <div data-content-type="text" data-appearance="default" data-element="main"
                    style="border-style: none; border-width: 1px; border-radius: 0px; margin: 0px; padding: 0px;">
                    <h2 class="" style="text-align: center;" contenteditable="true" data-placeholder="Edit Heading Text"
                        data-content-type="heading" data-appearance="default" data-element="main"><span
                        style="font-size: 16px;">Artfully crafted with luxurious details.</span></h2>
                    </div>
                    <div data-content-type="buttons" data-appearance="inline" data-same-width="false" data-element="main"
                    style="text-align: center; border-style: none; border-width: 1px; border-radius: 0px; margin: 0px; padding: 10px 10px 0px;">
                    <div data-content-type="button-item" data-appearance="default" data-element="main" style="display: inline-block;">
                        <div class="pagebuilder-button-primary" data-element="empty_link" style="text-align: center;"><span
                            data-element="link_text">Shop Now</span></div>
                    </div>
                    </div>
                </div>
                </div>
                <div data-content-type="row" data-appearance="contained" data-element="main">
                <div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-element="inner"
                    style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px;">
                    <div class="homepage-products-slider" data-content-type="products" data-appearance="grid" data-is-slider="true"
                    data-slides-to-show="5" data-slides-to-show-mobile="1" data-slides-to-show-tablet="2"
                    data-products-autoplay="false" data-products-autoplay-speed="4000" data-products-fade="false"
                    data-products-infinite-loop="false" data-products-show-arrows="true" data-products-show-dots="false"
                    data-element="main" style="border-style: none; border-width: 1px; border-radius: 0px;">
                    "{{widget type="Magento\CatalogWidget\Block\Product\ProductsList" template="Magento_CatalogWidget::product/widget/content/grid.phtml" anchor_text="" id_path="" show_pager="0" products_count="10" type_name="Catalog Products List" conditions_encoded="^['1:^[type: Magento||CatalogWidget||Model||Rule||Condition||Combine,aggregator:all,value:0,new_child:^]^]"}}"
                    </div>
                </div>
                </div>
                <div data-content-type="row" data-appearance="contained" data-element="main">
                <div class="homepage-uneven-tout-row" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}"
                    data-element="inner"
                    style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px;">
                    <div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="3"
                    data-element="main">
                    <div class="pagebuilder-column left-column" data-content-type="column" data-appearance="align-top"
                        data-background-images="{}" data-element="main"
                        style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; width: 66.6667%; align-self: flex-start;">
                        <div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never"
                        data-fullbleed="0" data-element="main">
                        <div class="pagebuilder-wrapper">
                            <div data-element="empty_link">
                            <div class="pagebuilder-banner-wrapper"
                                data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/Video_Left_1.jpg}}\&quot;}"
                                data-element="wrapper"
                                style="background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px;">
                                <div class="layout_wrapper" data-element="layout_wrapper"
                                style="justify-content: flex-start; display: flex; flex-direction: column;">
                                <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color=""
                                    data-element="overlay"
                                    style="border-radius: 0px; min-height: 450px; background-color: transparent; justify-content: flex-start; display: flex; flex-direction: column;">
                                    <div class="pagebuilder-poster-content">
                                    <div data-element="content"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="pagebuilder-column right-column" data-content-type="column" data-appearance="full-height"
                        data-background-images="{}" data-element="main"
                        style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; width: 33.3333%; align-self: stretch;">
                        <div data-content-type="banner" data-appearance="collage-left" data-show-button="always"
                        data-show-overlay="never" data-fullbleed="0" data-element="main">
                        <div class="pagebuilder-wrapper">
                            <div data-element="empty_link">
                            <div class="pagebuilder-banner-wrapper"
                                data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/Banner_Right_1.jpg}}\&quot;}"
                                data-element="wrapper"
                                style="background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; min-height: 450px;">
                                <div class="layout_wrapper" data-element="layout_wrapper"
                                style="justify-content: flex-end; display: flex; flex-direction: column;">
                                <div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay"
                                    style="background-color: transparent;">
                                    <div class="pagebuilder-collage-content">
                                    <div data-element="content">
                                        <div>
                                        <div>
                                            <div><span style="font-size: 24px; color: #ffffff;">Classics Redefined.</span></div>
                                            <div></div>
                                            <div><span style="font-size: 14px; color: #ffffff;">A modern twist on our everyday
                                                classics.</span></div>
                                        </div>
                                        </div>
                                    </div><button type="button" class="pagebuilder-banner-button pagebuilder-button-primary"
                                        data-element="button" style="opacity: 1; visibility: visible;">Shop Now</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div data-content-type="row" data-appearance="contained" data-element="main">
                <div class="double-tout-row" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}"
                    data-element="inner"
                    style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px;">
                    <div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="2"
                    data-element="main">
                    <div class="pagebuilder-column left-column" data-content-type="column" data-appearance="full-height"
                        data-background-images="{}" data-element="main"
                        style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; width: 50%; align-self: stretch;">
                        <div data-content-type="banner" data-appearance="collage-left" data-show-button="always"
                        data-show-overlay="never" data-fullbleed="0" data-element="main">
                        <div class="pagebuilder-wrapper">
                            <div data-element="empty_link">
                            <div class="pagebuilder-banner-wrapper"
                                data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/Group_2.png}}\&quot;}"
                                data-element="wrapper"
                                style="background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; min-height: 700px;">
                                <div class="layout_wrapper" data-element="layout_wrapper"
                                style="justify-content: flex-end; display: flex; flex-direction: column;">
                                <div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay"
                                    style="background-color: transparent;">
                                    <div class="pagebuilder-collage-content">
                                    <div data-element="content">
                                        <div>
                                        <div>
                                            <div><span style="font-size: 28px; color: #ffffff;">The Smarter Watch.</span></div>
                                            <div></div>
                                            <div><span style="font-size: 14px; color: #ffffff;">Track progress, monitor habits, look
                                                cool.</span></div>
                                        </div>
                                        </div>
                                    </div><button type="button" class="pagebuilder-banner-button pagebuilder-button-primary"
                                        data-element="button" style="opacity: 1; visibility: visible;">Shop Now</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="pagebuilder-column right-column" data-content-type="column" data-appearance="full-height"
                        data-background-images="{}" data-element="main"
                        style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; width: 50%; align-self: stretch;">
                        <div data-content-type="banner" data-appearance="collage-left" data-show-button="always"
                        data-show-overlay="never" data-fullbleed="0" data-element="main">
                        <div class="pagebuilder-wrapper">
                            <div data-element="empty_link">
                            <div class="pagebuilder-banner-wrapper"
                                data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/Vertcial_Right.png}}\&quot;}"
                                data-element="wrapper"
                                style="background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; min-height: 700px;">
                                <div class="layout_wrapper" data-element="layout_wrapper"
                                style="justify-content: flex-end; display: flex; flex-direction: column;">
                                <div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay"
                                    style="background-color: transparent;">
                                    <div class="pagebuilder-collage-content">
                                    <div data-element="content">
                                        <div>
                                        <div>
                                            <div><span style="color: #ffffff; background-color: transparent; font-size: 28px;">Ready,
                                                Set, Impress.</span></div>
                                            <div></div>
                                            <div><span style="color: #ffffff; font-size: 14px; background-color: transparent;">The
                                                perfect timepiece for the active person.</span></div>
                                        </div>
                                        </div>
                                    </div><button type="button" class="pagebuilder-banner-button pagebuilder-button-primary"
                                        data-element="button" style="opacity: 1; visibility: visible;">Shop Now</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div data-content-type="row" data-appearance="contained" data-element="main">
                <div class="homepage-overflowing-banner" data-enable-parallax="0" data-parallax-speed="0.5"
                    data-background-images="{}" data-element="inner"
                    style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px;">
                    <div data-content-type="banner" data-appearance="collage-right" data-show-button="always" data-show-overlay="never"
                    data-fullbleed="1" data-element="main">
                    <div class="pagebuilder-wrapper fullbleed">
                        <div data-element="empty_link">
                        <div class="pagebuilder-banner-wrapper"
                            data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/About.png}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/About.jpg}}\&quot;}"
                            data-element="wrapper"
                            style="background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; min-height: 500px;">
                            <div class="layout_wrapper" data-element="layout_wrapper"
                            style="justify-content: flex-end; display: flex; flex-direction: column;">
                            <div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay"
                                style="background-color: transparent;">
                                <div class="pagebuilder-collage-content">
                                <div data-element="content">
                                    <div>
                                    <div>
                                        <div>
                                        <div><span style="color: #ffffff; font-size: 26px;">Mercury Watches</span></div>
                                        <div></div>
                                        <div></div>
                                        <div><span style="color: #ffffff; font-size: 12px;">Mercury offers a range of watch styles,
                                            from the classic faces to modern technology, to compliment your lifestyle. For over 40
                                            yeras, Mercury has been dedicated to providing everlasting sophistication, detailed
                                            design, and bold statements to consumers around the world</span></div>
                                        </div>
                                    </div>
                                    </div>
                                </div><button type="button" class="pagebuilder-banner-button pagebuilder-button-secondary"
                                    data-element="button" style="opacity: 1; visibility: visible;">Learn More</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div data-content-type="row" data-appearance="contained" data-element="main">
                <div class="homepage-triple-tout-row" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}"
                    data-element="inner"
                    style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px;">
                    <div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="3"
                    data-element="main">
                    <div class="pagebuilder-column" data-content-type="column" data-appearance="full-height"
                        data-background-images="{}" data-element="main"
                        style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; width: 33.3333%; align-self: stretch;">
                        <div data-content-type="banner" data-appearance="poster" data-show-button="always" data-show-overlay="never"
                        data-fullbleed="0" data-element="main" style="margin: 0px;">
                        <div class="pagebuilder-wrapper">
                            <div data-element="empty_link">
                            <div class="pagebuilder-banner-wrapper"
                                data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/womens.png}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/womens.jpg}}\&quot;}"
                                data-element="wrapper"
                                style="background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; text-align: center;">
                                <div class="layout_wrapper" data-element="layout_wrapper"
                                style="justify-content: flex-start; display: flex; flex-direction: column;">
                                <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color=""
                                    data-element="overlay"
                                    style="border-radius: 0px; min-height: 600px; background-color: transparent; padding: 40px; justify-content: flex-start; display: flex; flex-direction: column;">
                                    <div class="pagebuilder-poster-content">
                                    <div data-element="content">
                                        <div>
                                        <p style="text-align: center;"><span style="font-size: 24px;">Women's Watches</span></p>
                                        <p style="text-align: center;"><span style="font-size: 16px;">Sophisticated, just like
                                            you.</span></p>
                                        </div>
                                    </div><button type="button" class="pagebuilder-banner-button pagebuilder-button-link"
                                        data-element="button" style="opacity: 1; visibility: visible;">Shop Women's</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="pagebuilder-column" data-content-type="column" data-appearance="full-height"
                        data-background-images="{}" data-element="main"
                        style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; width: 33.3333%; align-self: stretch;">
                        <div data-content-type="banner" data-appearance="poster" data-show-button="always" data-show-overlay="never"
                        data-fullbleed="0" data-element="main" style="margin: 0px;">
                        <div class="pagebuilder-wrapper">
                            <div data-element="empty_link">
                            <div class="pagebuilder-banner-wrapper"
                                data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/Mens.png}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/mens.jpg}}\&quot;}"
                                data-element="wrapper"
                                style="background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; text-align: center;">
                                <div class="layout_wrapper" data-element="layout_wrapper"
                                style="justify-content: flex-start; display: flex; flex-direction: column;">
                                <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color=""
                                    data-element="overlay"
                                    style="border-radius: 0px; min-height: 600px; background-color: transparent; padding: 40px; justify-content: flex-start; display: flex; flex-direction: column;">
                                    <div class="pagebuilder-poster-content">
                                    <div data-element="content">
                                        <div>
                                        <div>
                                            <p style="text-align: center;"><span style="font-size: 24px; color: #ffffff;">Men's
                                                Watches</span></p>
                                            <p style="text-align: center;"><span style="font-size: 16px; color: #ffffff;">Simple faces
                                                and modern accents.</span></p>
                                        </div>
                                        </div>
                                    </div><button type="button" class="pagebuilder-banner-button pagebuilder-button-link"
                                        data-element="button" style="opacity: 1; visibility: visible;">Shop Men's</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="pagebuilder-column" data-content-type="column" data-appearance="full-height"
                        data-background-images="{}" data-element="main"
                        style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; width: 33.3333%; align-self: stretch;">
                        <div data-content-type="banner" data-appearance="poster" data-show-button="always" data-show-overlay="never"
                        data-fullbleed="0" data-element="main" style="margin: 0px;">
                        <div class="pagebuilder-wrapper">
                            <div data-element="empty_link">
                            <div class="pagebuilder-banner-wrapper"
                                data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/rightest.jpg}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/limited.jpg}}\&quot;}"
                                data-element="wrapper"
                                style="background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; text-align: center;">
                                <div class="layout_wrapper" data-element="layout_wrapper"
                                style="justify-content: flex-start; display: flex; flex-direction: column;">
                                <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color=""
                                    data-element="overlay"
                                    style="border-radius: 0px; min-height: 600px; background-color: transparent; padding: 40px; justify-content: flex-start; display: flex; flex-direction: column;">
                                    <div class="pagebuilder-poster-content">
                                    <div data-element="content">
                                        <div>
                                        <div>
                                            <p style="text-align: center;"><span style="font-size: 24px; color: #ffffff;">Limited
                                                Edition</span></p>
                                            <p style="text-align: center;"><span style="font-size: 16px; color: #ffffff;">This season,
                                                showcase your unique self.</span></p>
                                        </div>
                                        </div>
                                    </div><button type="button" class="pagebuilder-banner-button pagebuilder-button-link"
                                        data-element="button" style="opacity: 1; visibility: visible;">Shop Limited Edition</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div data-content-type="row" data-appearance="contained" data-element="main">
                <div class="homepage-image-slider" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}"
                    data-element="inner"
                    style="justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px;">
                    <h1 data-content-type="heading" data-appearance="default" data-element="main"
                    style="text-align: center; border-style: none; border-width: 1px; border-radius: 0px;">In the Press</h1>
                    <div class="pagebuilder-slider" data-content-type="slider" data-appearance="default" data-autoplay="false"
                    data-autoplay-speed="4000" data-fade="false" data-infinite-loop="false" data-show-arrows="true"
                    data-show-dots="false" data-element="main"
                    style="min-height: 300px; border-style: none; border-width: 1px; border-radius: 0px; margin: 0px; padding: 0px;">
                    <div data-content-type="slide" data-slide-name="" data-appearance="poster" data-show-button="never"
                        data-show-overlay="never" data-element="main" style="margin: 0px;">
                        <div data-element="empty_link">
                        <div class="pagebuilder-slide-wrapper"
                            data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/logooo_1.png}}\&quot;}"
                            data-element="wrapper"
                            style="background-position: left top; background-size: cover; background-repeat: no-repeat; border-style: none; border-width: 1px; border-radius: 0px; min-height: 300px;">
                            <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" data-element="overlay"
                            style="min-height: 300px; padding: 40px; background-color: transparent;">
                            <div class="pagebuilder-poster-content">
                                <div data-element="content"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div data-content-type="slide" data-slide-name="" data-appearance="poster" data-show-button="never"
                        data-show-overlay="never" data-element="main" style="margin: 0px;">
                        <div data-element="empty_link">
                        <div class="pagebuilder-slide-wrapper"
                            data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/logo2.png}}\&quot;}"
                            data-element="wrapper"
                            style="background-position: left top; background-size: cover; background-repeat: no-repeat; border-style: none; border-width: 1px; border-radius: 0px; min-height: 300px;">
                            <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" data-element="overlay"
                            style="min-height: 300px; padding: 40px; background-color: transparent;">
                            <div class="pagebuilder-poster-content">
                                <div data-element="content"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div data-content-type="slide" data-slide-name="" data-appearance="poster" data-show-button="never"
                        data-show-overlay="never" data-element="main" style="margin: 0px;">
                        <div data-element="empty_link">
                        <div class="pagebuilder-slide-wrapper"
                            data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/logo3.png}}\&quot;}"
                            data-element="wrapper"
                            style="background-position: left top; background-size: cover; background-repeat: no-repeat; border-style: none; border-width: 1px; border-radius: 0px; min-height: 300px;">
                            <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" data-element="overlay"
                            style="min-height: 300px; padding: 40px; background-color: transparent;">
                            <div class="pagebuilder-poster-content">
                                <div data-element="content"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div data-content-type="slide" data-slide-name="" data-appearance="poster" data-show-button="never"
                        data-show-overlay="never" data-element="main" style="margin: 0px;">
                        <div data-element="empty_link">
                        <div class="pagebuilder-slide-wrapper"
                            data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/logo4.png}}\&quot;}"
                            data-element="wrapper"
                            style="background-position: left top; background-size: cover; background-repeat: no-repeat; border-style: none; border-width: 1px; border-radius: 0px; min-height: 300px;">
                            <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" data-element="overlay"
                            style="min-height: 300px; padding: 40px; background-color: transparent;">
                            <div class="pagebuilder-poster-content">
                                <div data-element="content"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div data-content-type="slide" data-slide-name="" data-appearance="poster" data-show-button="never"
                        data-show-overlay="never" data-element="main" style="margin: 0px;">
                        <div data-element="empty_link">
                        <div class="pagebuilder-slide-wrapper"
                            data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/logo5.png}}\&quot;}"
                            data-element="wrapper"
                            style="background-position: left top; background-size: cover; background-repeat: no-repeat; border-style: none; border-width: 1px; border-radius: 0px; min-height: 300px;">
                            <div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" data-element="overlay"
                            style="min-height: 300px; padding: 40px; background-color: transparent;">
                            <div class="pagebuilder-poster-content">
                                <div data-element="content"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div data-content-type="buttons" data-appearance="inline" data-same-width="false" data-element="main"
                    style="text-align: center; border-style: none; border-width: 1px; border-radius: 0px;">
                    <div data-content-type="button-item" data-appearance="default" data-element="main" style="display: inline-block;">
                        <div class="pagebuilder-button-secondary" data-element="empty_link" style="text-align: center;"><span
                            data-element="link_text">View All Press</span></div>
                    </div>
                    </div>
                </div>
            </div>
        `);
    }
}
