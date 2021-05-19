<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\MessageQueue;

use Wiserbrand\VpnProduct\Api\MessageQueue\HandlerInterface;
use Wiserbrand\VpnProduct\Api\MessageQueue\MessageInterface;
use Wiserbrand\VpnProduct\Api\UpdateManagementInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Handler
 * @package Wiserbrand\VpnProduct\MessageQueue
 */
class Handler implements HandlerInterface
{

    /**
     * @var UpdateManagementInterface
     */
    protected $updateManagement;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Handler constructor.
     *
     * @param UpdateManagementInterface $updateManagement
     * @param SerializerInterface       $serializer
     * @param LoggerInterface           $logger
     */
    public function __construct(
        UpdateManagementInterface $updateManagement,
        SerializerInterface $serializer,
        LoggerInterface $logger
    ) {
        $this->updateManagement = $updateManagement;
        $this->serializer = $serializer;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function processMessage(MessageInterface $message): void
    {
        try {
            $productData = $this->serializer->unserialize($message->getItem());
            $this->updateManagement->update($productData);
        } catch (\Exception $exception) {
            $this->logger->error($exception);
        }
    }
}
