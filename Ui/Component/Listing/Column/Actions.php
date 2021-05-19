<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class Actions
 * @package Wiserbrand\VpnProduct\Ui\Component\Listing\Column
 */
class Actions extends Column
{

    /**
     * Url path edit
     */
    protected const URL_PATH_EDIT = 'vpn_product/catalog/edit';

    /**
     * Url path delete
     */
    protected const URL_PATH_DELETE = 'vpn_product/catalog/delete';

    /**
     * Url builder interface
     *
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Constructor
     *
     * @param ContextInterface   $context            context
     * @param UiComponentFactory $uiComponentFactory ui component factory
     * @param UrlInterface       $urlBuilder         Url builder interface
     * @param array              $components         components
     * @param array              $data               data array
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource data source
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['product_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'id' => $item['product_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'id' => $item['product_id']
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete"'),
                                'message' => __('Are you sure you want to delete this?')
                            ]
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }
}
