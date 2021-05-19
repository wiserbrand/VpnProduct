<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Ui\Component\Form;

use Wiserbrand\VpnProduct\Model\ResourceModel\VpnProduct\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class DataProvider
 * @package Wiserbrand\VpnProduct\Ui\Component\Form
 */
class DataProvider extends AbstractDataProvider
{

    /**
     * Initialize dependencies.
     *
     * @param string            $name              name
     * @param string            $primaryFieldName  primary field name
     * @param string            $requestFieldName  request field name
     * @param CollectionFactory $collectionFactory collection factory
     * @param array             $meta              meta
     * @param array             $data              data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData(): array
    {
        if (empty($this->data)) {
            return $this->data;
        }

        $items = $this->getCollection()->getItems();

        foreach ($items as $item) {
            $this->data[$item->getId()] = $item->getData();
        }

        return $this->data;
    }
}
