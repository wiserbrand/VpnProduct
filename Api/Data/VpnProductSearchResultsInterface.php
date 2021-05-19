<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface VpnProductSearchResultsInterface
 * @package Wiserbrand\VpnProduct\Api\Data
 */
interface VpnProductSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get VpnProduct list.
     * @return \Wiserbrand\VpnProduct\Api\Data\VpnProductInterface[]
     */
    public function getItems();

    /**
     * Set entity_id list.
     * @param \Wiserbrand\VpnProduct\Api\Data\VpnProductInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

