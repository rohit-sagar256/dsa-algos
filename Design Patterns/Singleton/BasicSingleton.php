<?php

/**
 * Basic SingleTon Pattern
 */
class BasicSingleton
{

    private static ?BasicSingleton $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): BasicSingleton
    {
        if (self::$instance === null) {
            self::$instance = new BasicSingleton();
        }
        return self::$instance;
    }

    public function try(): string
    {
        return "yes!";
    }


}

$l = BasicSingleton::getInstance();
$l2 = BasicSingleton::getInstance();


return $l->try() === $l2->try();
