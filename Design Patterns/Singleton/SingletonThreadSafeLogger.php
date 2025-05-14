<?php



/**
 * Thread-Safe Singleton Simulation in PHP
 * Background: PHP doesn’t have native threads, but multiple PHP-FPM processes might simultaneously attempt to instantiate the Singleton. Your task is to simulate a thread-safe Singleton using file locks.
 *
 * Implement a FileLogger Singleton.
 *
 * The logger should:
 *    Write each log message to a file.
 *    Ensure only one instance is created safely even under simulated race conditions.
 *    Use file locking (flock) to prevent race conditions.
 *
 * Constraint
 *
 * You must use a file lock (flock) inside getInstance() to ensure only one process can instantiate it at a time.
 *
 */

class SingletonThreadSafeLogger
{


  private static ?SingletonThreadSafeLogger $instance = null;

  private function __construct() {}

  public static function getInstance(): SingletonThreadSafeLogger
  {
    if (self::$instance === null) {
      $lockFile = fopen(sys_get_temp_dir() . '/singleton_logger.lock', 'c');

      if ($lockFile === false) {
        throw new \RuntimeException("Unable to create lock file.");
      }

      // Acquire exclusive lock
      if (flock($lockFile, LOCK_EX)) {
        try {
          if (self::$instance === null) {
            self::$instance = new SingletonThreadSafeLogger();
          }
        } finally {
          // Release lock
          flock($lockFile, LOCK_UN);
          fclose($lockFile);
        }
      } else {
        fclose($lockFile);
        throw new \RuntimeException("Unable to acquire file lock.");
      }
    }

    return self::$instance;
  }

  private function __clone(): void {}

  public function __wakeup(): void {}


  public function log(string $message)
  {
    $this->logToAFile($message);
  }



  private function logToAFile(string $message)
  {
    $logFile = __DIR__ . '/thread_safe_singleton.txt';

    $file = fopen($logFile, 'a');

    if (!$file) {
      throw new \RuntimeException("Cannot open log file for writing.");
    }

    if (!flock($file, LOCK_EX)) {
      fclose($file);
      throw new \RuntimeException("Cannot acquire lock for log file.");
    }

    fwrite($file, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL);
    fflush($file);
    flock($file, LOCK_UN);
    fclose($file);
  }

  public function getLogs()
  {
    $logFile = __DIR__ . '/thread_safe_singleton.txt';

    if (!file_exists($logFile)) {
      throw new RuntimeException('unable to locate the file');
    }


    // $lines  = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // if ($lines === false) {
    //   throw new RuntimeException('Failed to read log file.');
    // }
    // return $lines;

    $logs = [];

    $handle = fopen($logFile, 'r');

    if ($handle === false) {
      throw new RuntimeException('Something went wrong');
    }

    while ($line = fgets($handle) !== false) {
      $trimmed = trim($line);
      if (!empty($trimmed)) {
        $logs[] = $trimmed;
      }

      echo $trimmed . PHP_EOL;
    }

    fclose($handle);

    return $logs;
  }
}
