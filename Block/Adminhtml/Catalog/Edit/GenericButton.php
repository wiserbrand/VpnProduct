<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Block\Adminhtml\Catalog\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\UrlInterface;

/**
 * Class GenericButton
 * @package Wiserbrand\VpnProduct\Block\Adminhtml\Catalog\Edit
 */
class GenericButton
{

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var Session
     */
    protected $session;

    /**
     * Constructor
     *
     * @param Context $context context
     * @param Session $session session
     */
    public function __construct(
        Context $context,
        Session $session
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->session = $session;
    }

    /**
     * Return the current product Id.
     *
     * @return string|null
     */
    public function getVpnProductId(): ?string
    {
        return $this->session->getData('current_vpvproduct_id');
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route  route
     * @param array  $params params
     *
     * @return string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->urlBuilder->getUrl($route, $params);
    }

    /**
     * Check where button can be rendered
     *
     * @param string $name name
     *
     * @return string
     */
    public function canRender(string $name): string
    {
        return $name;
    }
}
