<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A MIME Header with parameters.
 *
<<<<<<< HEAD
=======
 * @package    Swift
 * @subpackage Mime
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author     Chris Corbyn
 */
interface Swift_Mime_ParameterizedHeader extends Swift_Mime_Header
{
    /**
     * Set the value of $parameter.
     *
     * @param string $parameter
     * @param string $value
     */
    public function setParameter($parameter, $value);

    /**
     * Get the value of $parameter.
     *
     * @param string $parameter
     *
     * @return string
     */
    public function getParameter($parameter);
}
