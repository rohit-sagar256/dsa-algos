<?php

/**
 * Create a Singleton class CurrencyRateFetcher that reads currency exchange rates from a currency_rates.json file.
 */

class CurrencyRateFetcher
{

  private static ?CurrencyRateFetcher $instance = null;

  private array $rates = [];

  private function __construct()
  {
    $this->loadRates();
  }


  public function get(string $from, string  $to): ?float
  {
    return  $this->rates[$from][$to] ?? null;
  }


  public static function getInstance(): CurrencyRateFetcher
  {
    if (self::$instance === null) {
      self::$instance = new CurrencyRateFetcher();
    }
    return self::$instance;
  }

  private function loadRates()
  {
    $filePath = __DIR__ . '/rate.json';

    if (!file_exists($filePath)) throw new RuntimeException('Did not find the rate files');

    $file = json_decode(file_get_contents($filePath), true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      throw new RuntimeException('Something went wrong');
    }

    $this->rates = $file;
  }

  private function __clone() {}

  public function __wakeup()
  {
    throw new RuntimeException('cannot make another class');
  }
}

$rateApi = CurrencyRateFetcher::getInstance();
echo $rateApi->get('USD', 'INR');
