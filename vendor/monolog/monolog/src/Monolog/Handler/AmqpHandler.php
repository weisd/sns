<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Logger;
use Monolog\Formatter\JsonFormatter;
<<<<<<< HEAD
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Channel\AMQPChannel;
use AMQPExchange;
=======
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d

class AmqpHandler extends AbstractProcessingHandler
{
    /**
<<<<<<< HEAD
     * @var AMQPExchange|AMQPChannel $exchange
=======
     * @var \AMQPExchange $exchange
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
     */
    protected $exchange;

    /**
<<<<<<< HEAD
     * @var string
     */
    protected $exchangeName;

    /**
     * @param AMQPExchange|AMQPChannel $exchange     AMQPExchange (php AMQP ext) or PHP AMQP lib channel, ready for use
     * @param string                   $exchangeName
     * @param int                      $level
     * @param bool                     $bubble       Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($exchange, $exchangeName = 'log', $level = Logger::DEBUG, $bubble = true)
    {
        if ($exchange instanceof AMQPExchange) {
            $exchange->setName($exchangeName);
        } elseif ($exchange instanceof AMQPChannel) {
            $this->exchangeName = $exchangeName;
        } else {
            throw new \InvalidArgumentException('PhpAmqpLib\Channel\AMQPChannel or AMQPExchange instance required');
        }
        $this->exchange = $exchange;
=======
     * @param \AMQPExchange $exchange     AMQP exchange, ready for use
     * @param string        $exchangeName
     * @param int           $level
     * @param bool          $bubble       Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(\AMQPExchange $exchange, $exchangeName = 'log', $level = Logger::DEBUG, $bubble = true)
    {
        $this->exchange = $exchange;
        $this->exchange->setName($exchangeName);
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritDoc}
     */
    protected function write(array $record)
    {
        $data = $record["formatted"];

        $routingKey = sprintf(
            '%s.%s',
<<<<<<< HEAD
            // TODO 2.0 remove substr call
=======
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
            substr($record['level_name'], 0, 4),
            $record['channel']
        );

<<<<<<< HEAD
        if ($this->exchange instanceof AMQPExchange) {
            $this->exchange->publish(
                $data,
                strtolower($routingKey),
                0,
                array(
                    'delivery_mode' => 2,
                    'Content-type' => 'application/json'
                )
            );
        } else {
            $this->exchange->basic_publish(
                new AMQPMessage(
                    (string) $data,
                    array(
                        'delivery_mode' => 2,
                        'content_type' => 'application/json'
                    )
                ),
                $this->exchangeName,
                strtolower($routingKey)
            );
        }
=======
        $this->exchange->publish(
            $data,
            strtolower($routingKey),
            0,
            array(
                'delivery_mode' => 2,
                'Content-type' => 'application/json'
            )
        );
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter()
    {
        return new JsonFormatter(JsonFormatter::BATCH_MODE_JSON, false);
    }
}
