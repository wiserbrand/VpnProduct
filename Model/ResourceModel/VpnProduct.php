<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class VpnProduct
 * @package Wiserbrand\VpnProduct\Model\ResourceModel
 */
class VpnProduct extends AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Wiserbrand_VpnProduct', 'product_id');
    }
}
