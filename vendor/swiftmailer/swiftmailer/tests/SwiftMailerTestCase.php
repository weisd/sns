<?php

/**
 * A base test case with some custom expectations.
<<<<<<< HEAD
=======
 * @package     Swift
 * @subpackage  Tests
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author      Rouven Weßling
 */
class SwiftMailerTestCase extends \PHPUnit_Framework_TestCase
{
    public static function regExp($pattern)
    {
        if (!is_string($pattern)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        return new PHPUnit_Framework_Constraint_PCREMatch($pattern);
    }

    public function assertIdenticalBinary($expected, $actual, $message = '')
    {
        $constraint = new IdenticalBinaryConstraint($expected);
        self::assertThat($actual, $constraint, $message);
    }

    protected function tearDown()
    {
        \Mockery::close();
    }

    protected function getMockery($class)
    {
        return \Mockery::mock($class);
    }
}
