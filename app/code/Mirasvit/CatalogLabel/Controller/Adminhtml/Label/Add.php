<?php
/**
 * Mirasvit
 *
 * This source file is subject to the Mirasvit Software License, which is available at https://mirasvit.com/license/.
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to http://www.magentocommerce.com for more information.
 *
 * @category  Mirasvit
 * @package   mirasvit/module-cataloglabel
 * @version   1.1.18
 * @copyright Copyright (C) 2020 Mirasvit (https://mirasvit.com/)
 */



namespace Mirasvit\CatalogLabel\Controller\Adminhtml\Label;

use Magento\Framework\Controller\ResultFactory;

class Add extends \Mirasvit\CatalogLabel\Controller\Adminhtml\Label
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->getConfig()->getTitle()->prepend(__('New Label'));

        $this->getModel();

        $this->_initAction();

        $this->_addBreadcrumb(__('Manage Labels'), __('Manage Labels'), $this->getUrl('*/*/'));
        $this->_addBreadcrumb(__('New Label'), __('New Label'));

        $this->_addContent($resultPage->getLayout()->createBlock('\Mirasvit\CatalogLabel\Block\Adminhtml\Label\Edit'))
            ->_addLeft($resultPage->getLayout()->createBlock('\Mirasvit\CatalogLabel\Block\Adminhtml\Label\Edit\Tabs'));

        return $resultPage;
    }
}
