<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog;

use Magento\Framework\App\Action\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\Page;

/**
 * Class Edit
 * @package Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog
 */
class Edit extends Product
{

    /**
     * Option edit action
     *
     * @return Redirect|Page
     * @SuppressWarnings(PHPMD.ElseExpression)
     */
    public function execute()
    {
        $productId = $this->getRequest()->getParam('id', null);
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        if ($productId !== null) {
            try {
                $model = $this->vpnProductRepository->getById($productId);
            } catch (NoSuchEntityException $e) {
                $this->getMessageManager()->addErrorMessage(__('This rule no exists.'));
                return $resultRedirect->setPath('vpn_product/catalog/*');
            }
        } else {
            $model = $this->vpnProductFactory->create();
        }

        $this->_getSession()->setData('current_vpvproduct_id', $model->getId());

        /** @var \Magento\Backend\Model\View\Result\Page $page */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Wiserbrand_VpnProduct::vpnproduct');

        $resultPage->getConfig()->getTitle()->prepend(
            $model->getId() ? 'Product ID: ' . $model->getId() : __('New Product')
        );
        $resultPage->addBreadcrumb(
            $productId ? __('Edit Product') : __('New Product'),
            $productId ? __('Edit Product') : __('New Product')
        );

        return $resultPage;
    }
}
