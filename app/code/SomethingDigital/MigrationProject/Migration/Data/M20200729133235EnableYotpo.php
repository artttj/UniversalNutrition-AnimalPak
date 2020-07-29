<?php

namespace SomethingDigital\MigrationProject\Migration\Data;

use Magento\Framework\Setup\SetupInterface;
use Magento\Store\Model\ScopeInterface;
use SomethingDigital\Migration\Api\MigrationInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;

class M20200729133235EnableYotpo implements MigrationInterface
{
    protected $resourceConfig;

    const ENABLED = 1;
    const SCOPE_ID = 1;

    public function __construct(ResourceConfig $resourceConfig)
    {
        $this->resourceConfig = $resourceConfig;
    }

    public function execute(SetupInterface $setup)
    {
        $this->resourceConfig->saveConfig(
            'yotpo/settings/active',
            self::ENABLED,
            ScopeInterface::SCOPE_STORES,
            self::SCOPE_ID
        );
    }
}
