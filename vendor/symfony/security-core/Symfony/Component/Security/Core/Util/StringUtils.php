<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Util;

/**
 * String utility functions.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class StringUtils
{
    /**
     * This class should not be instantiated
     */
    private function __construct() {}

    /**
     * Compares two strings.
     *
     * This method implements a constant-time algorithm to compare strings.
     *
     * @param string $knownString The string of known length to compare against
     * @param string $userInput   The string that the user can control
     *
     * @return bool    true if the two strings are the same, false otherwise
     */
    public static function equals($knownString, $userInput)
    {
<<<<<<< HEAD
        $knownLen = strlen($knownString);
        $userLen = strlen($userInput);

        // Extend the known string to avoid uninitialized string offsets
        $knownString .= $userInput;

=======
        // Prevent issues if string length is 0
        $knownString .= chr(0);
        $userInput .= chr(0);

        $knownLen = strlen($knownString);
        $userLen = strlen($userInput);

>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        // Set the result to the difference between the lengths
        $result = $knownLen - $userLen;

        // Note that we ALWAYS iterate over the user-supplied length
        // This is to prevent leaking length information
        for ($i = 0; $i < $userLen; $i++) {
<<<<<<< HEAD
            $result |= (ord($knownString[$i]) ^ ord($userInput[$i]));
=======
            // Using % here is a trick to prevent notices
            // It's safe, since if the lengths are different
            // $result is already non-0
            $result |= (ord($knownString[$i % $knownLen]) ^ ord($userInput[$i]));
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        }

        // They are only identical strings if $result is exactly 0...
        return 0 === $result;
    }
}
