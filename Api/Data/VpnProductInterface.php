<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Api\Data;

/**
 * Interface VpnProductInterface
 * @package Wiserbrand\VpnProduct\Api\Data
 */
interface VpnProductInterface
{

    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    public const ENTITY_ID = 'product_id';
    public const COPYWRITE_INFO = 'copywrite_info';
    public const VPN = 'vpn';
    public const SKU = 'sku';
    /**#@-*/

    /**
     * Get entity ID
     *
     * @return int
     */
    public function getProductId(): int;

    /**
     * Set entity ID
     * @param int $entityId
     * @return VpnProductInterface
     */
    public function setProductId(int $entityId): VpnProductInterface;

    /**
     * Get copiwrite info
     * @return string|null
     */
    public function getCopywriteInfo(): ?string;

    /**
     * Set copiwrite info
     * @param null|string $copywriteInfo
     * @return VpnProductInterface
     */
    public function setCopywriteInfo(?string $copywriteInfo): VpnProductInterface;

    /**
     * Get vpn
     * @return string
     */
    public function getVpn(): string;

    /**
     * Set sku
     * @param string $vpn
     * @return VpnProductInterface
     */
    public function setVpn(string $vpn): VpnProductInterface;

    /**
     * Get vpn
     * @return string
     */
    public function getSku(): string;

    /**
     * Set sku
     * @param string $sku
     * @return VpnProductInterface
     */
    public function setSku(string $sku): VpnProductInterface;
}

