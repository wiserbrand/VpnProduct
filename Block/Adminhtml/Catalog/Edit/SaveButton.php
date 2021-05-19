<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Block\Adminhtml\Catalog\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * @package Wiserbrand\VpnProduct\Block\Adminhtml\Catalog\Edit
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve save button-specified settings
     *
     * @return array
     */
    public function getButtonData(): array
    {
        $data = [];
        if ($this->canRender('save')) {
            $data = [
                'label' => __('Save'),
                'class' => 'save primary',
                'on_click' => '',
            ];
        }
        return $data;
    }
}
