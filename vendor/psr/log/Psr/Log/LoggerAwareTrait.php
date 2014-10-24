<?php

namespace Psr\Log;

/**
 * Basic Implementation of LoggerAwareInterface.
 */
trait LoggerAwareTrait
{
    /** @var LoggerInterface */
    protected $logger;

    /**
     * Sets a logger.
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
