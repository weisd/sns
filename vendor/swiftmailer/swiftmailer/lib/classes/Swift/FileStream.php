<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * An OutputByteStream which specifically reads from a file.
 *
<<<<<<< HEAD
=======
 * @package    Swift
 * @subpackage ByteStream
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author     Chris Corbyn
 */
interface Swift_FileStream extends Swift_OutputByteStream
{
    /**
     * Get the complete path to the file.
     *
     * @return string
     */
    public function getPath();
}
