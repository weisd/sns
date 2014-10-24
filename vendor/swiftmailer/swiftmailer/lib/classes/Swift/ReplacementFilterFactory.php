<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Creates StreamFilters.
 *
<<<<<<< HEAD
=======
 * @package Swift
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author  Chris Corbyn
 */
interface Swift_ReplacementFilterFactory
{
    /**
     * Create a filter to replace $search with $replace.
     *
     * @param mixed $search
     * @param mixed $replace
     *
     * @return Swift_StreamFilter
     */
    public function createFilter($search, $replace);
}
