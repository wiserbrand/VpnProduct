<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\MessageQueue;

use Wiserbrand\VpnProduct\Api\MessageQueue\MessageInterface;
use Magento\Framework\DataObject;

/**
 * Class Message
 * @package Wiserbrand\VpnProduct\MessageQueue
 */
class Message extends DataObject implements MessageInterface
{

    /**
     * {@inheritdoc}
     */
    public function getItem(): string
    {
        return $this->getData(self::ITEM);
    }

    /**
     * {@inheritdoc}
     */
    public function setItem(string $item): MessageInterface
    {
        return $this->setData(self::ITEM, $item);
    }
}
