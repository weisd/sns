<?php

/**
 * @todo
 */
class Swift_Signers_OpenDKIMSignerTest extends \SwiftMailerTestCase
{
    public function setUp()
    {
        if (!extension_loaded('opendkim')) {
            $this->markTestSkipped(
                'Need OpenDKIM extension run these tests.'
             );
        }
    }

    public function testBasicSigningHeaderManipulation()
    {
    }

    // Default Signing
    public function testSigningDefaults()
    {
    }

    // SHA256 Signing
    public function testSigning256()
    {
    }

    // Relaxed/Relaxed Hash Signing
    public function testSigningRelaxedRelaxed256()
    {
    }

<<<<<<< HEAD
=======

>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    // Relaxed/Simple Hash Signing
    public function testSigningRelaxedSimple256()
    {
    }

    // Simple/Relaxed Hash Signing
    public function testSigningSimpleRelaxed256()
    {
    }
}
