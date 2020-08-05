<?php

namespace SomethingDigital\MigrationProject\Migration\Data;

use Magento\Framework\Setup\SetupInterface;
use SomethingDigital\Migration\Api\MigrationInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;

class M20200805132622AddBaseSettings implements MigrationInterface
{
    protected $resourceConfig;

    public function __construct(ResourceConfig $resourceConfig)
    {
        $this->resourceConfig = $resourceConfig;
    }

    public function execute(SetupInterface $setup)
    {
        $configs = [
            'general/store_information/name' => 'Animal Pak',
            'general/store_information/phone' => '(800) 872-0101',
            'general/store_information/country_id' => 'US',
            'general/store_information/region_id' => 41, //New Jersey
            'general/store_information/postcode' => '08901',
            'general/store_information/city' => 'New Brunswick',
            'general/store_information/street_line1' => '3 Terminal Road',

            'general/locale/code' => 'en_US',
            'general/locale/timezone' => 'America/New_York',
            'general/region/display_all' => '1',

            'design/email/logo_alt' => 'Animal Pak',
            'design/footer/copyright' => '&copy; {{ YEAR }} Animal Pak. All rights reserved.',

            'design/socialprofiles/social_facebook' => 'https://www.facebook.com/officialanimalpak',
            'design/socialprofiles/social_twitter' => 'https://twitter.com/Animalpak',
            'design/socialprofiles/social_instagram' => 'https://www.instagram.com/animalpak/',
            'design/socialprofiles/social_youtube' => 'https://www.youtube.com/user/UniversalNutrition',

            'currency/options/allow' => 'USD',

            'catalog/productalert_cron/error_email' => 'UniversalNutrition-AnimalPak@Somethingdigital.onmicrosoft.com',
            'sitemap/generate/error_email' => 'UniversalNutrition-AnimalPak@Somethingdigital.onmicrosoft.com',
            'system/magento_scheduled_import_export_log/error_email' => 'UniversalNutrition-AnimalPak@Somethingdigital.onmicrosoft.com',

            'catalog/seo/product_url_suffix' => '',
            'catalog/seo/category_url_suffix' => '',

            'trans_email/ident_general/name' => 'Animal Pak',
            'trans_email/ident_sales/name' => 'Animal Pak',
            'trans_email/ident_support/name' => 'Animal Pak',
            'trans_email/ident_custom1/name' => 'Animal Pak',
            'trans_email/ident_custom2/name' => 'Animal Pak',
            'trans_email/ident_general/email' => 'info@animalpak.com',
            'trans_email/ident_sales/email' => 'info@animalpak.com',
            'trans_email/ident_support/email' => 'info@animalpak.com',
            'trans_email/ident_custom1/email' => 'info@animalpak.com',
            'trans_email/ident_custom2/email' => 'info@animalpak.com',

            'customer/magento_customerbalance/is_enabled' => '0',
            'customer/magento_customerbalance/show_history' => '0',

            'sales/magento_rma/enabled' => '0',
            'sales/magento_rma/enabled_on_product' => '0',
            'sales/magento_rma/use_store_address' => '0',

            'magento_reward/general/is_enabled' => '0',
            'magento_reward/general/is_enabled_on_front' => '0',

            'magento_invitation/general/enabled' => '0',
            'magento_invitation/general/enabled_on_front' => '0',

            'magento_giftregistry/general/enabled' => '0',

            'wishlist/general/active' => '1',
        ];

        $this->setConfigs($configs);
    }

    protected function setConfigs(array $configs)
    {
        foreach ($configs as $path => $value) {
            $this->setConfig($path, $value);
        }
    }

    protected function setConfig($path, $value)
    {
        $this->resourceConfig->saveConfig($path, $value, 'default', 0);
    }
}
