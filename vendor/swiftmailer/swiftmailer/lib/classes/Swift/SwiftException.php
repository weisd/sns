<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Base Exception class.
 *
<<<<<<< HEAD
=======
 * @package Swift
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author  Chris Corbyn
 */
class Swift_SwiftException extends Exception
{
    /**
     * Create a new SwiftException with $message.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
