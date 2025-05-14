<?php

class ConfigManager
{
    private static ?ConfigManager $instance = null;

    private array $config;

    private function __construct(array $config)
    {
        $this->config = $config;
    }

    public static function getInstance(array $config = []): ConfigManager
    {
        if (self::$instance === null) {
            self::$instance = new ConfigManager($config);
        }
        return self::$instance;
    }


    public function getConfig(): array
    {
        return $this->config;
    }


    public function config(string $key): mixed
    {
        return $this->config[$key] ?? null;
    }


    public function reset() {
        self::$instance = null;
    }
}


$configManager1 = ConfigManager::getInstance(["m" => true]);
$configManager2 = ConfigManager::getInstance();

var_dump($configManager2->getConfig());


