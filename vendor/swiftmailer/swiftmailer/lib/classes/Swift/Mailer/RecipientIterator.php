<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Provides an abstract way of specifying recipients for batch sending.
 *
<<<<<<< HEAD
=======
 * @package    Swift
 * @subpackage Mailer
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author     Chris Corbyn
 */
interface Swift_Mailer_RecipientIterator
{
    /**
     * Returns true only if there are more recipients to send to.
     *
     * @return bool
     */
    public function hasNext();

    /**
     * Returns an array where the keys are the addresses of recipients and the
     * values are the names. e.g. ('foo@bar' => 'Foo') or ('foo@bar' => NULL)
     *
     * @return array
     */
    public function nextRecipient();
}
