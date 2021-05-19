<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\Api\MessageQueue;

/**
 * Interface HandlerInterface
 * @package Wiserbrand\VpnProduct\Api\MessageQueue
 */
interface HandlerInterface
{

    /**
     * Process products message
     *
     * @param MessageInterface $message Message instance
     *
     * @return void
     */
    public function processMessage(MessageInterface $message): void;
}
