<?php
require __DIR__ . '/SingletonThreadSafeLogger.php';
$logger = SingletonThreadSafeLogger::getInstance();

$logger->log("Log from process " . getmypid());
echo "Logged by process: " . getmypid() . PHP_EOL;

var_dump($logger->getLogs());
