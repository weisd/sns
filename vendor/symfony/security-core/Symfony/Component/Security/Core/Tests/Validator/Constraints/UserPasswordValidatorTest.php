<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Tests\Validator\Constraints;

<<<<<<< HEAD
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class UserPasswordValidatorTest extends AbstractConstraintValidatorTest
{
    const PASSWORD = 's3Cr3t';

    const SALT = '^S4lt$';

    /**
     * @var SecurityContextInterface
     */
    protected $securityContext;

    /**
     * @var PasswordEncoderInterface
     */
    protected $encoder;

    /**
     * @var EncoderFactoryInterface
     */
    protected $encoderFactory;

    protected function createValidator()
    {
        return new UserPasswordValidator($this->securityContext, $this->encoderFactory);
    }

    protected function setUp()
    {
        $user = $this->createUser();
        $this->securityContext = $this->createSecurityContext($user);
        $this->encoder = $this->createPasswordEncoder();
        $this->encoderFactory = $this->createEncoderFactory($this->encoder);

        parent::setUp();
=======
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator;

class UserPasswordValidatorTest extends \PHPUnit_Framework_TestCase
{
    const PASSWORD_VALID   = true;
    const PASSWORD_INVALID = false;

    protected $context;

    protected function setUp()
    {
        $this->context = $this->getMock('Symfony\Component\Validator\ExecutionContext', array(), array(), '', false);
    }

    protected function tearDown()
    {
        $this->context = null;
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    }

    public function testPasswordIsValid()
    {
<<<<<<< HEAD
        $constraint = new UserPassword(array(
            'message' => 'myMessage',
        ));

        $this->encoder->expects($this->once())
            ->method('isPasswordValid')
            ->with(static::PASSWORD, 'secret', static::SALT)
            ->will($this->returnValue(true));

        $this->validator->validate('secret', $constraint);

        $this->assertNoViolation();
=======
        $user = $this->createUser();
        $securityContext = $this->createSecurityContext($user);

        $encoder = $this->createPasswordEncoder(static::PASSWORD_VALID);
        $encoderFactory = $this->createEncoderFactory($encoder);

        $validator = new UserPasswordValidator($securityContext, $encoderFactory);
        $validator->initialize($this->context);

        $this
            ->context
            ->expects($this->never())
            ->method('addViolation')
        ;

        $validator->validate('secret', new UserPassword());
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    }

    public function testPasswordIsNotValid()
    {
<<<<<<< HEAD
        $constraint = new UserPassword(array(
            'message' => 'myMessage',
        ));

        $this->encoder->expects($this->once())
            ->method('isPasswordValid')
            ->with(static::PASSWORD, 'secret', static::SALT)
            ->will($this->returnValue(false));

        $this->validator->validate('secret', $constraint);

        $this->assertViolation('myMessage');
    }

    /**
     * @expectedException \Symfony\Component\Validator\Exception\ConstraintDefinitionException
     */
    public function testUserIsNotValid()
    {
        $user = $this->getMock('Foo\Bar\User');

        $this->securityContext = $this->createSecurityContext($user);
        $this->validator = $this->createValidator();
        $this->validator->initialize($this->context);

        $this->validator->validate('secret', new UserPassword());
=======
        $user = $this->createUser();
        $securityContext = $this->createSecurityContext($user);

        $encoder = $this->createPasswordEncoder(static::PASSWORD_INVALID);
        $encoderFactory = $this->createEncoderFactory($encoder);

        $validator = new UserPasswordValidator($securityContext, $encoderFactory);
        $validator->initialize($this->context);

        $this
            ->context
            ->expects($this->once())
            ->method('addViolation')
        ;

        $validator->validate('secret', new UserPassword());
    }

    public function testUserIsNotValid()
    {
        $this->setExpectedException('Symfony\Component\Validator\Exception\ConstraintDefinitionException');

        $user = $this->getMock('Foo\Bar\User');
        $encoderFactory = $this->getMock('Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface');
        $securityContext = $this->createSecurityContext($user);

        $validator = new UserPasswordValidator($securityContext, $encoderFactory);
        $validator->initialize($this->context);
        $validator->validate('secret', new UserPassword());
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    }

    protected function createUser()
    {
        $mock = $this->getMock('Symfony\Component\Security\Core\User\UserInterface');

        $mock
<<<<<<< HEAD
            ->expects($this->any())
            ->method('getPassword')
            ->will($this->returnValue(static::PASSWORD))
        ;

        $mock
            ->expects($this->any())
            ->method('getSalt')
            ->will($this->returnValue(static::SALT))
=======
            ->expects($this->once())
            ->method('getPassword')
            ->will($this->returnValue('s3Cr3t'))
        ;

        $mock
            ->expects($this->once())
            ->method('getSalt')
            ->will($this->returnValue('^S4lt$'))
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        ;

        return $mock;
    }

    protected function createPasswordEncoder($isPasswordValid = true)
    {
<<<<<<< HEAD
        return $this->getMock('Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface');
=======
        $mock = $this->getMock('Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface');

        $mock
            ->expects($this->once())
            ->method('isPasswordValid')
            ->will($this->returnValue($isPasswordValid))
        ;

        return $mock;
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    }

    protected function createEncoderFactory($encoder = null)
    {
        $mock = $this->getMock('Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface');

        $mock
<<<<<<< HEAD
            ->expects($this->any())
=======
            ->expects($this->once())
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
            ->method('getEncoder')
            ->will($this->returnValue($encoder))
        ;

        return $mock;
    }

    protected function createSecurityContext($user = null)
    {
        $token = $this->createAuthenticationToken($user);

        $mock = $this->getMock('Symfony\Component\Security\Core\SecurityContextInterface');
        $mock
<<<<<<< HEAD
            ->expects($this->any())
=======
            ->expects($this->once())
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
            ->method('getToken')
            ->will($this->returnValue($token))
        ;

        return $mock;
    }

    protected function createAuthenticationToken($user = null)
    {
        $mock = $this->getMock('Symfony\Component\Security\Core\Authentication\Token\TokenInterface');
        $mock
<<<<<<< HEAD
            ->expects($this->any())
=======
            ->expects($this->once())
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
            ->method('getUser')
            ->will($this->returnValue($user))
        ;

        return $mock;
    }
}
