<?php

/**Follows Singleton design pattern (no thread safety needed).
 * Reads the config.json file once and stores the result.
 *  Exposes a method like get(string $key, mixed $default = null) that supports dot notation:
 *
 * get('app_name') → "Mviper"
 * get('database.host') → "localhost"
 * get('invalid.key', 'fallback') → "fallback"
 *
 * Bonus:
 *  Return null or fallback if a key doesn’t exist.
 *  If the config file is invalid, throw an exception.
 */

class ConfigReader
{
  private static ?ConfigReader $instance = null;

  private array $config = [];


  private function __construct()
  {
    $this->loadConfigs();
  }


  public static function getInstance(): ConfigReader
  {
    if (self::$instance === null) {
      self::$instance = new ConfigReader();
    }

    return self::$instance;
  }

  public function get(string $key = '')
  {
    if (empty($key)) return $this->config;

    $exploded = explode('.', $key);
;
    $configValue = $this->config;

    foreach ($exploded as $keyPart) {
      if (isset($configValue[$keyPart])) {
        $configValue = $configValue[$keyPart];
      } else {
        return null;
      }
    }
    return $configValue;

  }

  private function loadConfigs()
  {
    $configFile = __DIR__ . '/config.json';

    $configFileContents = file_get_contents($configFile);

    if ($configFileContents === false) {
      return new RuntimeException('Could not load config file');
    }

    $configFromJson = json_decode(file_get_contents($configFile), true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      throw new RuntimeException('Error decoding JSON config file.');
    }

    $this->config = $configFromJson;
  }
}


$configReader = ConfigReader::getInstance();

var_dump($configReader->get('database.mysql.host'));
