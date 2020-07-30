<?php

namespace SomethingDigital\MigrationProject\Migration\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\SetupInterface;
use SomethingDigital\Migration\Api\MigrationInterface;

class M20200729200856AddBadgeAttribute implements MigrationInterface
{
    private $eavSetup;

    public function __construct(EavSetup $eavSetup)
    {
        $this->eavSetup = $eavSetup;
    }

    public function execute(SetupInterface $setup)
    {
        $this->eavSetup->addAttribute(
            Product::ENTITY,
            'badge',
            [
                'group' => 'General',
                'type' => 'text',
                'backend' => ArrayBackend::class,
                'frontend' => '',
                'label' => 'Badge',
                'input' => 'select',
                'class' => '',
                'option' => [
                    'value' => [
                        'new' => [
                            0 => 'New',
                            1 => 'New',
                        ],
                        'hot' => [
                            0 => 'Hot',
                            1 => 'Hot',
                        ],
                        'best_seller' => [
                            0 => 'Best Seller',
                            1 => 'Best Seller',
                        ],
                    ],
                ],
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'default' => '',
                'user_defined' => true,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
            ]
        );
    }
}
