<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A factory for creating CharacterReaders.
 *
<<<<<<< HEAD
=======
 * @package    Swift
 * @subpackage Encoder
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author     Chris Corbyn
 */
interface Swift_CharacterReaderFactory
{
    /**
     * Returns a CharacterReader suitable for the charset applied.
     *
     * @param string $charset
     *
     * @return Swift_CharacterReader
     */
    public function getReaderFor($charset);
}
