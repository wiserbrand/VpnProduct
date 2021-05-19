<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog;

use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Index
 * @package Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog
 */
class Index extends Product
{

    /**
     * Index action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        /** @var Page $page */
        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $page->setActiveMenu('Wiserbrand_VpnProduct::vpnproduct');
        $page->getConfig()->getTitle()->prepend(__('Email Rules'));

        return $page;
    }
}
