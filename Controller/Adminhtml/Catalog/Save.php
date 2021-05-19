<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog;

use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Save
 * @package Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog
 */
class Save extends Product
{

    /**
     * Authorization level of a basic admin session
     *
     * @see isAllowed()
     */
    public const ADMIN_RESOURCE = 'Wiserbrand_VpnProduct::VpnProduct_save';

    /**
     * Rule save action
     *
     * @return Redirect
     */
    public function execute(): Redirect
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            return $resultRedirect->setPath('*/*/index');
        }

        $productId = $this->getRequest()->getParam('product_id', '');

        try {
            $model = $this->vpnProductRepository->getById($productId);
        } catch (NoSuchEntityException $exception) {
            $model = $this->vpnProductFactory->create();
        }

        try {
            $model->setData($data);
            $this->vpnProductRepository->save($model);
            $this->messageManager->addSuccessMessage('Product successfully saved');
        } catch (CouldNotSaveException | LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/index');
    }
}
