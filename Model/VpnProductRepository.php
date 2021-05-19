<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Model;

use Wiserbrand\VpnProduct\Api\Data\VpnProductInterface;
use Wiserbrand\VpnProduct\Api\Data\VpnProductInterfaceFactory;
use Wiserbrand\VpnProduct\Api\Data\VpnProductSearchResultsInterface;
use Wiserbrand\VpnProduct\Api\Data\VpnProductSearchResultsInterfaceFactory;
use Wiserbrand\VpnProduct\Api\VpnProductRepositoryInterface;
use Wiserbrand\VpnProduct\Model\ResourceModel\VpnProduct as ResourceVpnProduct;
use Wiserbrand\VpnProduct\Model\ResourceModel\VpnProduct\CollectionFactory as VpnProductCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class VpnProductRepository
 * @package Wiserbrand\VpnProduct\Model
 */
class VpnProductRepository implements VpnProductRepositoryInterface
{

    /**
     * @var ResourceVpnProduct
     */
    protected $resource;

    /**
     * @var VpnProductInterfaceFactory
     */
    protected $vpnProductFactory;

    /**
     * @var VpnProductCollectionFactory
     */
    protected $vpnProductCollectionFactory;

    /**
     * @var VpnProductSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @param ResourceVpnProduct $resource
     * @param VpnProductInterfaceFactory $vpnProductFactory
     * @param VpnProductCollectionFactory $vpnProductCollectionFactory
     * @param VpnProductSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ResourceVpnProduct $resource,
        VpnProductInterfaceFactory $vpnProductFactory,
        VpnProductCollectionFactory $vpnProductCollectionFactory,
        VpnProductSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->vpnProductFactory = $vpnProductFactory;
        $this->vpnProductCollectionFactory = $vpnProductCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * {@inheritdoc}
     */
    public function save(VpnProductInterface $vpnProduct): VpnProductInterface
    {
        try {
            $this->resource->save($vpnProduct);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not save the vpnProduct'), $exception);
        }

        return $vpnProduct;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($productId): VpnProductInterface
    {
        /** @var VpnProductInterface $vpnProduct */
        $vpnProduct = $this->vpnProductFactory->create();
        $this->resource->load($vpnProduct, $productId);

        if (!$vpnProduct->getId()) {
            throw new NoSuchEntityException(__('VpnProduct with id "%1" does not exist.', $productId));
        }

        return $vpnProduct;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria): VpnProductSearchResultsInterface
    {
        $collection = $this->vpnProductCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setItems($collection->getItems());
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $entityId): bool
    {
        try {
            $model = $this->getById($entityId);
            $this->resource->delete($model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__('Could not delete the VpnProduct'), $exception);
        }

        return true;
    }
}
