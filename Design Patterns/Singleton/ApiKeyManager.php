

<?php

/**
 * Challenge: API Key Manager (Singleton)
 * Goal:
 * Create a Singleton class ApiKeyManager that:
 *
 * Loads API keys from a keys.json file (e.g., for Stripe, OpenAI, Mailgun, etc.).
 *
 * Ensures the file is only loaded once.
 *
 * Provides a method get(string $service): ?string to return the key.
 *
 * Ignores missing keys (returns null if not found).
 *
 * Prevents cloning and unserialization (strict Singleton enforcement).
 */


class ApiKeyManager
{

  private static ?ApiKeyManager $instance = null;

  private array $apiKeys = [];

  private function  __construct()
  {
    $this->loadApiKeyJson();
  }


  public function get(string $service): string|null
  {
    return $this->apiKeys[$service] ?? null;
  }

  private function  loadApiKeyJson()
  {
    $filePath = __DIR__ . '/keys.json';

    if (!file_exists($filePath)) throw new RuntimeException('Something went wrong');

    $file = json_decode(file_get_contents($filePath), true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      throw new RuntimeException("Could not load ERROR");
    }

    $this->apiKeys = $file;
  }


  public static function getInstance(): ApiKeyManager
  {
    if (self::$instance === null) {
      self::$instance = new ApiKeyManager();
    }
    return self::$instance;
  }

  private function __clone() {}

  public function __wakeup() {
    throw new \RuntimeException("Cannot unserialize singleton");
  }
}



$apiKeyManager = ApiKeyManager::getInstance();

echo $apiKeyManager->get('stripe');
