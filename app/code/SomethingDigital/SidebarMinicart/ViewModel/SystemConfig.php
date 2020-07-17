<?php


namespace SomethingDigital\SidebarMinicart\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

class SystemConfig implements ArgumentInterface
{
    protected $_scopeConfig;

    /**
     *  MinicartLayoutObserver constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->_scopeConfig = $scopeConfig;
    }

    public function getConfig($config_path)
    {
        return $this->_scopeConfig->getValue(
            $config_path,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function autoDisplayEnabled()
    {
        return (bool)$this->getConfig('checkout/sidebar/auto_minicart_sidebar');
    }

    public function secondsToDisplay()
    {
        return $this->getConfig('checkout/sidebar/seconds_minicart_sidebar');
    }

}
