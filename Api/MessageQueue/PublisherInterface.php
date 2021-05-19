<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Api\MessageQueue;

/**
 * Interface PublisherInterface
 * @package Wiserbrand\VpnProduct\Api\MessageQueue
 */
interface PublisherInterface
{

    /**
     * Publish message to queue
     *
     * @param string[] $product
     *
     * @return void
     */
    public function publish(array $product): void;
}
