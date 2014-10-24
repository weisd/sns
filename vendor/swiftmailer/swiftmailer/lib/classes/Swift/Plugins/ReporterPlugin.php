<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Does real time reporting of pass/fail for each recipient.
 *
<<<<<<< HEAD
=======
 * @package    Swift
 * @subpackage Plugins
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author     Chris Corbyn
 */
class Swift_Plugins_ReporterPlugin implements Swift_Events_SendListener
{
    /**
     * The reporter backend which takes notifications.
     *
<<<<<<< HEAD
     * @var Swift_Plugins_Reporter
=======
     * @var Swift_Plugin_Reporter
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
     */
    private $_reporter;

    /**
     * Create a new ReporterPlugin using $reporter.
     *
     * @param Swift_Plugins_Reporter $reporter
     */
    public function __construct(Swift_Plugins_Reporter $reporter)
    {
        $this->_reporter = $reporter;
    }

    /**
     * Not used.
     */
    public function beforeSendPerformed(Swift_Events_SendEvent $evt)
    {
    }

    /**
     * Invoked immediately after the Message is sent.
     *
     * @param Swift_Events_SendEvent $evt
     */
    public function sendPerformed(Swift_Events_SendEvent $evt)
    {
        $message = $evt->getMessage();
        $failures = array_flip($evt->getFailedRecipients());
        foreach ((array) $message->getTo() as $address => $null) {
            $this->_reporter->notify(
                $message, $address, (array_key_exists($address, $failures)
                ? Swift_Plugins_Reporter::RESULT_FAIL
                : Swift_Plugins_Reporter::RESULT_PASS)
                );
        }
        foreach ((array) $message->getCc() as $address => $null) {
            $this->_reporter->notify(
                $message, $address, (array_key_exists($address, $failures)
                ? Swift_Plugins_Reporter::RESULT_FAIL
                : Swift_Plugins_Reporter::RESULT_PASS)
                );
        }
        foreach ((array) $message->getBcc() as $address => $null) {
            $this->_reporter->notify(
                $message, $address, (array_key_exists($address, $failures)
                ? Swift_Plugins_Reporter::RESULT_FAIL
                : Swift_Plugins_Reporter::RESULT_PASS)
                );
        }
    }
}
