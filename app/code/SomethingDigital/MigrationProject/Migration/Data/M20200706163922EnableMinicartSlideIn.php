<?php

namespace SomethingDigital\MigrationProject\Migration\Data;

use Magento\Framework\Setup\SetupInterface;
use SomethingDigital\Migration\Api\MigrationInterface;
use SomethingDigital\Migration\Helper\Cms\Page as PageHelper;
use SomethingDigital\Migration\Helper\Cms\Block as BlockHelper;
use SomethingDigital\Migration\Helper\Email\Template as EmailHelper;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;

class M20200706163922EnableMinicartSlideIn implements MigrationInterface
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
        $this->resourceConfig->saveConfig('checkout/sidebar/enable_minicart_sidebar', 1, 'default', 0);
    }
}
