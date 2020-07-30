<?php

namespace SomethingDigital\MigrationProject\Migration\Data;

use Magento\Framework\Setup\SetupInterface;
use SomethingDigital\Migration\Api\MigrationInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;

class M20200729143957EnableKlaviyo implements MigrationInterface
{
    protected $resourceConfig;

    const ENABLED = 1;
    const SCOPE_ID = 0;

    public function __construct(ResourceConfig $resourceConfig)
    {
        $this->resourceConfig = $resourceConfig;
    }

    public function execute(SetupInterface $setup)
    {
        $this->resourceConfig->saveConfig(
            'klaviyo_reclaim_general/general/enable',
            self::ENABLED,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
            self::SCOPE_ID
        );
    }
}
