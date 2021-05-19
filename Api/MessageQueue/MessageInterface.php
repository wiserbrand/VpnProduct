<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Api\MessageQueue;

/**
 * Interface MessageInterface
 * @package Wiserbrand\VpnProduct\Api\MessageQueue
 */
interface MessageInterface
{

    /**
     * Product items
     */
    public const ITEM = 'product_item';

    /**
     * Get product item
     *
     * @return string
     */
    public function getItem(): string;

    /**
     * Set product items
     *
     * @param string $item
     * @return MessageInterface
     */
    public function setItem(string $item): MessageInterface;
}
