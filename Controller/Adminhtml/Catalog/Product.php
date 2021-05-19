<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog;

use Wiserbrand\VpnProduct\Api\Data\VpnProductInterfaceFactory;
use Wiserbrand\VpnProduct\Api\VpnProductRepositoryInterface;
use Magento\Backend\App\Action;

/**
 * Class Product
 * @package Wiserbrand\VpnProduct\Controller\Adminhtml\Catalog
 */
abstract class Product extends Action
{

    /**
     * Authorization level of a basic admin session
     *
     * @see isAllowed()
     */
    public const ADMIN_RESOURCE = 'Wiserbrand_VpnProduct::VpnProduct';

    /**
     * @var VpnProductRepositoryInterface
     */
    protected $vpnProductRepository;

    /**
     * @var VpnProductInterfaceFactory
     */
    protected $vpnProductFactory;

    /**
     * Rule constructor.
     * @param Action\Context $context
     * @param VpnProductRepositoryInterface $vpnProductRepository
     * @param VpnProductInterfaceFactory $vpnProductFactory
     */
    public function __construct(
        Action\Context $context,
        VpnProductRepositoryInterface $vpnProductRepository,
        VpnProductInterfaceFactory $vpnProductFactory
    ) {
        parent::__construct($context);

        $this->vpnProductRepository = $vpnProductRepository;
        $this->vpnProductFactory = $vpnProductFactory;
    }
}
