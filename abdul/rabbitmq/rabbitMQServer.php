<?php

//composer was called and created.
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

//using port 5672 to talk with rmq through amqp.
$connection = new AMQPStreamConnection('localhost', 5672, '490', '123456');
$channel = $connection->channel();

$channel->queue_declare('rpc_queue', false, false, false, false);
?>
