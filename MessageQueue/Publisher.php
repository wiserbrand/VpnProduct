<?php

declare(strict_types=1);

namespace Wiserbrand\VpnProduct\MessageQueue;

use Wiserbrand\VpnProduct\Api\MessageQueue\MessageInterfaceFactory;
use Wiserbrand\VpnProduct\Api\MessageQueue\PublisherInterface;
use Magento\Framework\MessageQueue\PublisherInterface as QueuePublisherInterface;
use Magento\Framework\Serialize\SerializerInterface;

/**
 * Class Publisher
 * @package Wiserbrand\VpnProduct\MessageQueue
 */
class Publisher implements PublisherInterface
{

    /**
     * @var QueuePublisherInterface
     */
    protected $publisher;

    /**
     * @var MessageInterfaceFactory
     */
    protected $messageFactory;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Publisher constructor
     *
     * @param QueuePublisherInterface $publisher      Message publisher
     * @param MessageInterfaceFactory $messageFactory Message factory
     */
    public function __construct(
        QueuePublisherInterface $publisher,
        MessageInterfaceFactory $messageFactory,
        SerializerInterface $serializer
    ) {
        $this->publisher = $publisher;
        $this->messageFactory = $messageFactory;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function publish(array $product): void
    {
        if ($product = $this->serializer->serialize($product)) {
            $message = $this->messageFactory->create();
            $message->setItem($product);

            $this->publisher->publish('wiserbrand.vpnproduct.update', $message);
        }
    }
}
