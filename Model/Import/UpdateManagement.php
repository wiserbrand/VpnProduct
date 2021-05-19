<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Model\Import;

use Wiserbrand\VpnProduct\Api\Data\VpnProductInterface;
use Wiserbrand\VpnProduct\Api\Data\VpnProductInterfaceFactory;
use Wiserbrand\VpnProduct\Api\UpdateManagementInterface;
use Wiserbrand\VpnProduct\Api\VpnProductRepositoryInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

/**
 * Class UpdateManagement
 * @package Wiserbrand\VpnProduct\Model\Import
 */
class UpdateManagement implements UpdateManagementInterface
{

    /**
     * @var VpnProductInterfaceFactory
     */
    protected $vpnProductFactory;

    /**
     * @var VpnProductRepositoryInterface
     */
    protected $vpnProductRepository;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * UpdateManagement constructor.
     * @param VpnProductInterfaceFactory $vpnProductFactory
     * @param VpnProductRepositoryInterface $vpnProductRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        VpnProductInterfaceFactory $vpnProductFactory,
        VpnProductRepositoryInterface $vpnProductRepository,
        LoggerInterface $logger
    ) {
        $this->vpnProductFactory = $vpnProductFactory;
        $this->vpnProductRepository = $vpnProductRepository;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function update(array $productData): void
    {
        try {
            $product = $this->vpnProductFactory->create();
            if ($productData[VpnProductInterface::ENTITY_ID]) {
                $product->setProductId($productData[VpnProductInterface::ENTITY_ID]);
            }
            $product->setSku($productData[VpnProductInterface::SKU]);
            $product->setVpn($productData[VpnProductInterface::VPN]);
            $product->setCopywriteInfo($productData[VpnProductInterface::COPYWRITE_INFO]);

            $this->vpnProductRepository->save($product);
        } catch (CouldNotSaveException $exception) {
            $this->logger->critical($exception->getMessage(), $productData);
        }
    }
}
