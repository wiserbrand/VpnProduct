<?php


declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Block\Adminhtml\Catalog\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 * @package Wiserbrand\VpnProduct\Block\Adminhtml\Catalog\Edit
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve delete button-specified settings
     *
     * @return array
     */
    public function getButtonData(): array
    {
        $data = [];
        $productId = $this->getVpnProductId();
        if ($productId && $this->canRender('delete')) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to delete this?'
                ) . '\', \'' . $this->getUrl('*/*/delete', ['id' => $productId]) . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }
}
