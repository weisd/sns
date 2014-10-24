<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Pop3Connection interface for connecting and disconnecting to a POP3 host.
 *
<<<<<<< HEAD
=======
 * @package    Swift
 * @subpackage Plugins
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author     Chris Corbyn
 */
interface Swift_Plugins_Pop_Pop3Connection
{
    /**
     * Connect to the POP3 host and throw an Exception if it fails.
     *
     * @throws Swift_Plugins_Pop_Pop3Exception
     */
    public function connect();

    /**
     * Disconnect from the POP3 host and throw an Exception if it fails.
     *
     * @throws Swift_Plugins_Pop_Pop3Exception
     */
    public function disconnect();
}
