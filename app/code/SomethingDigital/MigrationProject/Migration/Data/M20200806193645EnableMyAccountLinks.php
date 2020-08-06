<?php

namespace SomethingDigital\MigrationProject\Migration\Data;

use Magento\Framework\Setup\SetupInterface;
use SomethingDigital\Migration\Api\MigrationInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;

class M20200806193645EnableMyAccountLinks implements MigrationInterface
{
    protected $resourceConfig;

    public function __construct(ResourceConfig $resourceConfig)
    {
        $this->resourceConfig = $resourceConfig;
    }

    public function execute(SetupInterface $setup)
    {
        $configs = [
            'customer/magento_customerbalance/is_enabled' => '1',
            'customer/magento_customerbalance/show_history' => '1',

            'sales/magento_rma/enabled' => '1',
            'sales/magento_rma/enabled_on_product' => '1',
            'sales/magento_rma/use_store_address' => '1',
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
