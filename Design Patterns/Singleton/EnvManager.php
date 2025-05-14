<?php

/**
 * Challenge: Environment Variable Manager
 * Goal:
 *
 * Create a Singleton class called EnvManager that reads environment variables from a .env file (key=value format). It should:
 *
 *
 * Requirements:
 *  Only load and parse the .env file once.
 *
 *  Provide a method get(string $key, $default = null) to fetch environment variables.
 *
 *  Use the Singleton pattern to ensure only one instance exists.
 *
 *  Ignore comments (#) and empty lines.
 *
 *  Trim whitespace around keys and values.
 *
 */
class EnvManager
{

  private array $env = [];

  private static ?EnvManager $instance = null;

  private function __construct()
  {
    $this->loadEnv();
  }

  public static function getInstance(): EnvManager
  {
    if (self::$instance === null) {
      self::$instance = new  EnvManager();
    }

    return self::$instance;
  }


  public function get(string $key, $default = null)
  {
    return $this->env[$key] ?? $default;
  }

  private function loadEnv()
  {
    $envFilePath = __DIR__ . "/.env";

    $lines = file($envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines === false) {
      throw new RuntimeException('Failed to read file');
    }

    foreach ($lines as $line) {

      $line = trim($line);

      if (str_starts_with($line, '#')) {
        continue;
      }
      $parts = explode('=', $line, 2);

      if (count($parts) === 2) {
        $key = trim($parts[0]);
        $value = trim($parts[1]);
        $this->env[$key] = $value;
      }
    }
  }
}


$envManager = EnvManager::getInstance();

var_dump($envManager->get("DB_HOST"));
