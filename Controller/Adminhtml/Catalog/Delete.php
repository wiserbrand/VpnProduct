<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog;

use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Class Delete
 * @package Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog
 */
class Delete extends Product
{

    /**
     * Authorization level of a basic admin session
     *
     * @see isAllowed()
     */
    public const ADMIN_RESOURCE = 'Wiserbrand_VpnProduct::VpnProduct_delete';

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        $productId = (int) $this->getRequest()->getParam('id');

        try {
            $this->vpnProductRepository->deleteById($productId);
            $this->messageManager->addSuccessMessage(__('Product with ID %1 was removed', $productId));
        } catch (CouldNotDeleteException $exception) {
            $this->messageManager->addErrorMessage(__($exception->getMessage()));
        }

        return $resultRedirect->setPath('*/*/index');
    }
}
