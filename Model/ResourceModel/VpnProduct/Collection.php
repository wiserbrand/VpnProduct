<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Model\ResourceModel\VpnProduct;

use Wiserbrand\VpnProduct\Model\ResourceModel\VpnProduct as VpnProductResource;
use Wiserbrand\VpnProduct\Model\VpnProduct;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Wiserbrand\VpnProduct\Model\ResourceModel\VpnProduct
 */
class Collection extends AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'product_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(VpnProduct::class, VpnProductResource::class);
    }
}
