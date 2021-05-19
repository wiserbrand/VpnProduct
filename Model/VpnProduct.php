<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Model;

use Wiserbrand\VpnProduct\Api\Data\VpnProductInterface;
use Wiserbrand\VpnProduct\Model\ResourceModel\VpnProduct as VpnProductResource;
use Magento\Framework\Model\AbstractModel;

/**
 * Class VpnProduct
 * @package Wiserbrand\VpnProduct\Model
 */
class VpnProduct extends AbstractModel implements VpnProductInterface
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(VpnProductResource::class,);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductId(): int
    {
        return (int) $this->getData(self::ENTITY_ID);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductId(int $entityId): VpnProductInterface
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * {@inheritDoc}
     */
    public function getCopywriteInfo(): ?string
    {
        return $this->getData(self::COPYWRITE_INFO);
    }

    /**
     * {@inheritDoc}
     */
    public function setCopywriteInfo(?string $copywriteInfo): VpnProductInterface
    {
        return $this->setData(self::COPYWRITE_INFO, $copywriteInfo);
    }

    /**
     * {@inheritDoc}
     */
    public function getVpn(): string
    {
        return (string) $this->getData(self::VPN);
    }

    /**
     * {@inheritDoc}
     */
    public function setVpn(string $vpn): VpnProductInterface
    {
        return $this->setData(self::VPN, $vpn);
    }

    /**
     * {@inheritDoc}
     */
    public function getSku(): string
    {
        return (string) $this->getData(self::SKU);
    }

    /**
     * {@inheritDoc}
     */
    public function setSku(string $sku): VpnProductInterface
    {
        return $this->setData(self::SKU, $sku);
    }
}
