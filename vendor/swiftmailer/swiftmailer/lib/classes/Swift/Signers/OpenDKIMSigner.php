<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
/**
 * DKIM Signer used to apply DKIM Signature to a message
 * Takes advantage of pecl extension
 *
=======

/**
 * DKIM Signer used to apply DKIM Signature to a message
 * Takes advantage of pecl extension 
 *
 * @package    Swift
 * @subpackage Signatures
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author     Xavier De Cock <xdecock@gmail.com>
 */
class Swift_Signers_OpenDKIMSigner extends Swift_Signers_DKIMSigner
{
    private $_peclLoaded = false;

    private $_dkimHandler = null;

    private $dropFirstLF = true;

    const CANON_RELAXED = 1;
    const CANON_SIMPLE = 2;
    const SIG_RSA_SHA1 = 3;
    const SIG_RSA_SHA256 = 4;

    public function __construct($privateKey, $domainName, $selector)
    {
        if (extension_loaded('opendkim')) {
            $this->_peclLoaded = true;
        } else {
             throw new Swift_SwiftException('php-opendkim extension not found');
        }
        parent::__construct($privateKey, $domainName, $selector);
    }
<<<<<<< HEAD

=======
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    public static function newInstance($privateKey, $domainName, $selector)
    {
        return new static($privateKey, $domainName, $selector);
    }

    public function addSignature(Swift_Mime_HeaderSet $headers)
    {
        $header = new Swift_Mime_Headers_OpenDKIMHeader('DKIM-Signature');
        $headerVal=$this->_dkimHandler->getSignatureHeader();
        if (!$headerVal) {
            throw new Swift_SwiftException('OpenDKIM Error: '.$this->_dkimHandler->getError());
        }
        $header->setValue($headerVal);
        $headers->set($header);

        return $this;
    }

    public function setHeaders(Swift_Mime_HeaderSet $headers)
    {
        $bodyLen = $this->_bodyLen;
        if (is_bool($bodyLen)) {
            $bodyLen = - 1;
        }
        $hash = ($this->_hashAlgorithm == 'rsa-sha1') ? OpenDKIMSign::ALG_RSASHA1 : OpenDKIMSign::ALG_RSASHA256;
        $bodyCanon = ($this->_bodyCanon == 'simple') ? OpenDKIMSign::CANON_SIMPLE : OpenDKIMSign::CANON_RELAXED;
        $headerCanon = ($this->_headerCanon == 'simple') ? OpenDKIMSign::CANON_SIMPLE : OpenDKIMSign::CANON_RELAXED;
        $this->_dkimHandler = new OpenDKIMSign($this->_privateKey, $this->_selector, $this->_domainName, $headerCanon, $bodyCanon, $hash, $bodyLen);
        // Hardcode signature Margin for now
        $this->_dkimHandler->setMargin(78);
<<<<<<< HEAD

        if (!is_numeric($this->_signatureTimestamp)) {
               OpenDKIM::setOption(OpenDKIM::OPTS_FIXEDTIME, time());
        } else {
            if (!OpenDKIM::setOption(OpenDKIM::OPTS_FIXEDTIME, $this->_signatureTimestamp)) {
                throw new Swift_SwiftException('Unable to force signature timestamp ['.openssl_error_string().']');
            }
        }
=======
        
        if (!is_numeric($this->_signatureTimestamp)) {
	       	OpenDKIM::setOption(OpenDKIM::OPTS_FIXEDTIME, time());
        } else {
        	if (!OpenDKIM::setOption(OpenDKIM::OPTS_FIXEDTIME, $this->_signatureTimestamp)) {
		        throw new Swift_SwiftException('Unable to force signature timestamp ['.openssl_error_string().']');
    	    }
	    }
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        if (isset($this->_signerIdentity)) {
            $this->_dkimHandler->setSigner($this->_signerIdentity);
        }
        $listHeaders = $headers->listAll();
        foreach ($listHeaders as $hName) {
            // Check if we need to ignore Header
            if (! isset($this->_ignoredHeaders[strtolower($hName)])) {
                $tmp = $headers->getAll($hName);
                if ($headers->has($hName)) {
                    foreach ($tmp as $header) {
                        if ($header->getFieldBody() != '') {
<<<<<<< HEAD
                            $htosign = $header->toString();
=======
                        	$htosign = $header->toString();
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
                            $this->_dkimHandler->header($htosign);
                            $this->_signedHeaders[] = $header->getFieldName();
                        }
                    }
                }
            }
        }
<<<<<<< HEAD

=======
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        return $this;
    }

    public function startBody()
    {
        if (! $this->_peclLoaded) {
            return parent::startBody();
        }
        $this->dropFirstLF = true;
        $this->_dkimHandler->eoh();
<<<<<<< HEAD

=======
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        return $this;
    }

    public function endBody()
    {
        if (! $this->_peclLoaded) {
<<<<<<< HEAD
            return parent::endBody();
        }
        $this->_dkimHandler->eom();

=======
        	return parent::endBody();
        }
        $this->_dkimHandler->eom();
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        return $this;
    }

    public function reset()
    {
        $this->_dkimHandler = null;
        parent::reset();
<<<<<<< HEAD

=======
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        return $this;
    }

    /**
     * Set the signature timestamp
     *
     * @param timestamp $time
     * @return Swift_Signers_DKIMSigner
     */
    public function setSignatureTimestamp($time)
    {
<<<<<<< HEAD
        $this->_signatureTimestamp = $time;

        return $this;
    }

=======
    	$this->_signatureTimestamp = $time;
    	return $this;
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * Set the signature expiration timestamp
     *
     * @param timestamp $time
     * @return Swift_Signers_DKIMSigner
     */
    public function setSignatureExpiration($time)
    {
<<<<<<< HEAD
        $this->_signatureExpiration = $time;

        return $this;
    }

=======
    	$this->_signatureExpiration = $time;
    
    	return $this;
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * Enable / disable the DebugHeaders
     *
     * @param bool    $debug
     * @return Swift_Signers_DKIMSigner
     */
    public function setDebugHeaders($debug)
    {
        $this->_debugHeaders = (bool) $debug;

        return $this;
    }
<<<<<<< HEAD

=======
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    // Protected

    protected function _canonicalizeBody($string)
    {
        if (! $this->_peclLoaded) {
            return parent::_canonicalizeBody($string);
        }
        if (false && $this->dropFirstLF === true) {
            if ($string[0]=="\r" && $string[1]=="\n") {
                $string=substr($string, 2);
            }
        }
        $this->dropFirstLF = false;
        if (strlen($string)) {
<<<<<<< HEAD
            $this->_dkimHandler->body($string);
=======
        	$this->_dkimHandler->body($string);
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        }
    }
}
