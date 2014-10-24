<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * The Message class for building emails.
 *
<<<<<<< HEAD
=======
 * @package    Swift
 * @subpackage Mime
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
 * @author     Chris Corbyn
 */
class Swift_Message extends Swift_Mime_SimpleMessage
{
    /**
     * @var Swift_Signers_HeaderSigner[]
     */
    private $headerSigners = array();

    /**
     * @var Swift_Signers_BodySigner[]
     */
    private $bodySigners = array();

    /**
     * @var array
     */
    private $savedMessage = array();

<<<<<<< HEAD
    /**
=======
	/**
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
     * Create a new Message.
     *
     * Details may be optionally passed into the constructor.
     *
     * @param string $subject
     * @param string $body
     * @param string $contentType
     * @param string $charset
     */
    public function __construct($subject = null, $body = null, $contentType = null, $charset = null)
    {
        call_user_func_array(
            array($this, 'Swift_Mime_SimpleMessage::__construct'),
            Swift_DependencyContainer::getInstance()
                ->createDependenciesFor('mime.message')
            );

        if (!isset($charset)) {
            $charset = Swift_DependencyContainer::getInstance()
                ->lookup('properties.charset');
        }
        $this->setSubject($subject);
        $this->setBody($body);
        $this->setCharset($charset);
        if ($contentType) {
            $this->setContentType($contentType);
        }
    }

    /**
     * Create a new Message.
     *
     * @param string $subject
     * @param string $body
     * @param string $contentType
     * @param string $charset
     *
     * @return Swift_Message
     */
    public static function newInstance($subject = null, $body = null, $contentType = null, $charset = null)
    {
        return new self($subject, $body, $contentType, $charset);
    }

    /**
     * Add a MimePart to this Message.
     *
     * @param string|Swift_OutputByteStream $body
     * @param string                        $contentType
     * @param string                        $charset
     *
     * @return Swift_Mime_SimpleMessage
     */
    public function addPart($body, $contentType = null, $charset = null)
    {
        return $this->attach(Swift_MimePart::newInstance(
            $body, $contentType, $charset
            ));
    }
<<<<<<< HEAD

=======
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * Attach a new signature handler to the message.
     *
     * @param Swift_Signer $signer
     * @return Swift_Message
     */
    public function attachSigner(Swift_Signer $signer)
    {
        if ($signer instanceof Swift_Signers_HeaderSigner) {
            $this->headerSigners[] = $signer;
        } elseif ($signer instanceof Swift_Signers_BodySigner) {
            $this->bodySigners[] = $signer;
        }
<<<<<<< HEAD

=======
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
        return $this;
    }

    /**
     * Attach a new signature handler to the message.
     *
     * @param Swift_Signer $signer
     * @return Swift_Message
     */
    public function detachSigner(Swift_Signer $signer)
    {
        if ($signer instanceof Swift_Signers_HeaderSigner) {
            foreach ($this->headerSigners as $k => $headerSigner) {
                if ($headerSigner === $signer) {
                    unset($this->headerSigners[$k]);
<<<<<<< HEAD

=======
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
                    return $this;
                }
            }
        } elseif ($signer instanceof Swift_Signers_BodySigner) {
            foreach ($this->bodySigners as $k => $bodySigner) {
                if ($bodySigner === $signer) {
                    unset($this->bodySigners[$k]);
<<<<<<< HEAD

                    return $this;
                }
            }
        }

        return $this;
    }

=======
                    return $this;
                }
            }
    	}
    
    	return $this;
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * Get this message as a complete string.
     *
     * @return string
     */
    public function toString()
    {
<<<<<<< HEAD
        if (empty($this->headerSigners) && empty($this->bodySigners)) {
            return parent::toString();
        }

        $this->saveMessage();

        $this->doSign();

        $string = parent::toString();

        $this->restoreMessage();

        return $string;
    }

=======
    	if (empty($this->headerSigners) && empty($this->bodySigners)) {
    		return parent::toString();
    	}
    	
        $this->saveMessage();
        
        $this->doSign();
        
        $string = parent::toString();
        
        $this->restoreMessage();
    
    	return $string;
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * Write this message to a {@link Swift_InputByteStream}.
     *
     * @param Swift_InputByteStream $is
     */
    public function toByteStream(Swift_InputByteStream $is)
    {
        if (empty($this->headerSigners) && empty($this->bodySigners)) {
            parent::toByteStream($is);
<<<<<<< HEAD

            return;
        }

        $this->saveMessage();

        $this->doSign();

        parent::toByteStream($is);

        $this->restoreMessage();

    }

=======
            return;
        }
        
        $this->saveMessage();
        
        $this->doSign();
        
        parent::toByteStream($is);
        
        $this->restoreMessage();
    	
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    public function __wakeup()
    {
        Swift_DependencyContainer::getInstance()->createDependenciesFor('mime.message');
    }
<<<<<<< HEAD

=======
    
    /* -- Protected Methods -- */
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * loops through signers and apply the signatures
     */
    protected function doSign()
    {
<<<<<<< HEAD
        foreach ($this->bodySigners as $signer) {
            $altered = $signer->getAlteredHeaders();
            $this->saveHeaders($altered);
            $signer->signMessage($this);
        }

        foreach ($this->headerSigners as $signer) {
            $altered = $signer->getAlteredHeaders();
            $this->saveHeaders($altered);
            $signer->reset();

            $signer->setHeaders($this->getHeaders());

            $signer->startBody();
            $this->_bodyToByteStream($signer);
            $signer->endBody();

            $signer->addSignature($this->getHeaders());
        }
    }

=======
    	foreach ($this->bodySigners as $signer) {
    		$altered = $signer->getAlteredHeaders();
    		$this->saveHeaders($altered);
    		$signer->signMessage($this);
    	}
    
    	foreach ($this->headerSigners as $signer) {
    		$altered = $signer->getAlteredHeaders();
    		$this->saveHeaders($altered);
    		$signer->reset();
    
    		$signer->setHeaders($this->getHeaders());
    
    		$signer->startBody();
    		$this->_bodyToByteStream($signer);
    		$signer->endBody();
    
    		$signer->addSignature($this->getHeaders());
    	}
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * save the message before any signature is applied
     */
    protected function saveMessage()
    {
<<<<<<< HEAD
        $this->savedMessage = array('headers'=> array());
        $this->savedMessage['body'] = $this->getBody();
        $this->savedMessage['children'] = $this->getChildren();
        if (count($this->savedMessage['children']) > 0 && $this->getBody() != '') {
            $this->setChildren(array_merge(array($this->_becomeMimePart()), $this->savedMessage['children']));
            $this->setBody('');
        }
    }

=======
    	$this->savedMessage = array('headers'=> array());
    	$this->savedMessage['body'] = $this->getBody();
    	$this->savedMessage['children'] = $this->getChildren();
    	if (count($this->savedMessage['children']) > 0 && $this->getBody() != '') {
    		$this->setChildren(array_merge(array($this->_becomeMimePart()), $this->savedMessage['children']));
    		$this->setBody('');
    	}
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * save the original headers
     * @param array $altered
     */
    protected function saveHeaders(array $altered)
    {
<<<<<<< HEAD
        foreach ($altered as $head) {
            $lc = strtolower($head);

            if (!isset($this->savedMessage['headers'][$lc])) {
                $this->savedMessage['headers'][$lc] = $this->getHeaders()->getAll($head);
            }
        }
    }

=======
    	foreach ($altered as $head) {
    		$lc = strtolower($head);
    
    		if (!isset($this->savedMessage['headers'][$lc])) {
    			$this->savedMessage['headers'][$lc] = $this->getHeaders()->getAll($head);
    		}
    	}
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * Remove or restore altered headers
     */
    protected function restoreHeaders()
    {
<<<<<<< HEAD
        foreach ($this->savedMessage['headers'] as $name => $savedValue) {
            $headers = $this->getHeaders()->getAll($name);

            foreach ($headers as $key => $value) {
                if (!isset($savedValue[$key])) {
                    $this->getHeaders()->remove($name, $key);
                }
            }
        }
    }

=======
    	foreach ($this->savedMessage['headers'] as $name => $savedValue) {
    		$headers = $this->getHeaders()->getAll($name);
    
    		foreach ($headers as $key => $value) {
    			if (!isset($savedValue[$key])) {
    				$this->getHeaders()->remove($name, $key);
    			}
    		}
    	}
    }
    
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    /**
     * Restore message body
     */
    protected function restoreMessage()
    {
<<<<<<< HEAD
        $this->setBody($this->savedMessage['body']);
        $this->setChildren($this->savedMessage['children']);

        $this->restoreHeaders();
        $this->savedMessage = array();
=======
    	$this->setBody($this->savedMessage['body']);
    	$this->setChildren($this->savedMessage['children']);
    
    	$this->restoreHeaders();
    	$this->savedMessage = array();
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    }
}
