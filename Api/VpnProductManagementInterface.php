<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Api;

use Wiserbrand\VpnProduct\Api\Data\VpnProductInterface;

/**
 * Interface VpnProductManagementInterface
 * @package Wiserbrand\VpnProduct\Api
 */
interface VpnProductManagementInterface
{

    /**
     * GET Products by vpn
     *
     * @param string $vpn
     * @return \Wiserbrand\VpnProduct\Api\Data\VpnProductSearchResultsInterface
     */
    public function getProductsByVpn(string $vpn);

    /**
     * Update product
     *
     * @param \Wiserbrand\VpnProduct\Api\Data\VpnProductInterface $vpnProduct
     *
     * @return string
     */
    public function updateProduct(VpnProductInterface $vpnProduct): string;
}
