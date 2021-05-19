<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Api;

/**
 * Interface UpdateManagementInterface
 * @package Wiserbrand\VpnProduct\Api
 */
interface UpdateManagementInterface
{

    /**
     * Update product
     *
     * @param array $productData
     */
    public function update(array $productData): void;
}
