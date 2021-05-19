<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Model;

use Wiserbrand\VpnProduct\Api\Data\VpnProductInterface;
use Wiserbrand\VpnProduct\Api\MessageQueue\PublisherInterface;
use Wiserbrand\VpnProduct\Api\VpnProductManagementInterface;
use Wiserbrand\VpnProduct\Api\VpnProductRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class VpnProductManagement
 * @package Wiserbrand\VpnProduct\Model
 */
class VpnProductManagement implements VpnProductManagementInterface
{

    /**
     * @var SearchCriteriaBuilder
     */
    protected $criteriaBuilder;

    /**
     * @var FilterBuilder
     */
    protected $filterBuilder;

    /**
     * @var VpnProductRepositoryInterface
     */
    protected $vpnProductRepository;

    /**
     * @var PublisherInterface
     */
    protected $publisher;

    /**
     * VpnProductManagement constructor.
     * @param SearchCriteriaBuilder $criteriaBuilder
     * @param FilterBuilder $filterBuilder
     * @param VpnProductRepositoryInterface $vpnProductRepository
     * @param PublisherInterface $publisher
     */
    public function __construct(
        SearchCriteriaBuilder $criteriaBuilder,
        FilterBuilder $filterBuilder,
        VpnProductRepositoryInterface $vpnProductRepository,
        PublisherInterface $publisher,
    ) {
        $this->criteriaBuilder = $criteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->vpnProductRepository = $vpnProductRepository;
        $this->publisher = $publisher;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductsByVpn($vpn)
    {
        $this->criteriaBuilder->addFilters(
            [$this->filterBuilder->setField('vpn')->setValue($vpn)->setConditionType('eq')->create()]
        );
        $searchCriteria = $this->criteriaBuilder->create();

        return $this->vpnProductRepository->getList($searchCriteria);
    }

    /**
     * {@inheritdoc}
     */
    public function updateProduct(VpnProductInterface $vpnProduct): string
    {
        $productData = [
            VpnProductInterface::ENTITY_ID => $vpnProduct->getProductId() ?: null,
            VpnProductInterface::SKU => $vpnProduct->getSku(),
            VpnProductInterface::VPN => $vpnProduct->getVpn(),
            VpnProductInterface::COPYWRITE_INFO => $vpnProduct->getCopywriteInfo() ?: null,
        ];

        $this->publisher->publish($productData);

        return 'Request was successfully put in queue';
    }
}
