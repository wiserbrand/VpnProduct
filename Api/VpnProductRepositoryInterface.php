<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Api;

use Wiserbrand\VpnProduct\Api\Data\VpnProductInterface;
use Wiserbrand\VpnProduct\Api\Data\VpnProductSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;

/**
 * Interface VpnProductRepositoryInterface
 * @package Wiserbrand\VpnProduct\Api
 */
interface VpnProductRepositoryInterface
{

    /**
     * Save VpnProduct
     * @param VpnProductInterface $vpnProduct
     * @return VpnProductInterface
     * @throws CouldNotSaveException
     */
    public function save(VpnProductInterface $vpnProduct): VpnProductInterface;

    /**
     * Retrieve VpnProduct
     * @param int $productId
     * @return VpnProductInterface
     * @throws LocalizedException
     */
    public function getById(int $productId): VpnProductInterface;

    /**
     * Retrieve VpnProduct matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return VpnProductSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): VpnProductSearchResultsInterface;

    /**
     * Delete VpnProduct by ID
     * @param int $productId
     * @return bool true on success
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $productId): bool;
}

