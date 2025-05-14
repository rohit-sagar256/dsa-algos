<?php

/**
 * 1. Basic Singleton Implementation
 * Task:
 * Implement a class Logger that logs messages to an array and provides:
 *
 * log(string $message): void
 *
 * getLogs(): array
 *
 * Constraint:
 * Ensure only one instance of Logger is ever created.
 */


class Logger
{
  private static ?Logger $instance = null;

  private array $logs = [];


  private function __construct() {}


  public static function getInstance(): Logger
  {
    if (self::$instance === null) {
      self::$instance = new Logger();
    }
    return self::$instance;
  }


  public function log(string $message): void
  {
    $this->logs[] = $message;
  }


  public function getLogs(): array
  {
    return $this->logs;
  }

  private function __clone() {}

  private function __wakeup() {}
}


$logger = Logger::getInstance();
$logger2 = Logger::getInstance();
$logger->log("Hello World!");
var_dump($logger->getLogs());
var_dump($logger2 === $logger);

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


/**
 * Singleton with Dependency Injection
 * Task:
 *      Build a DatabaseConnection singleton class that:
 *
 *      Accepts configuration (host, username, password, dbname)
 *
 *      Returns a single PDO connection
 *
 *      Uses dependency injection for configuration
 *
 *      Prevents serialization and cloning
 *
 *      Validates config before connecting
 *
 * Bonus:
 *      Make it testable (inject a mock config or mock PDO).
 */
class DatabaseConnection
{

  private static ?DatabaseConnection $instance = null;


  private string $host = 'localhost';
  private string $username;
  private string $password;
  private string $dbname;

  private PDO $pdo;

  /**
   * @throws Exception
   */
  private function __construct(
    string $host,
    string $username,
    string $password,
    string $dbname
  ) {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;

    $this->validate();
    $this->connect();
  }


  /**
   * @throws Exception
   */
  public static function getInstance(string $host, string $username, string $password, string $dbname): DatabaseConnection
  {
    if (self::$instance === null) {
      self::$instance = new DatabaseConnection($host, $username, $password, $dbname);
    }
    return self::$instance;
  }


  //    public function host(string $host): DatabaseConnection
  //    {
  //        $this->host = $host;
  //        return $this;
  //    }
  //
  //    public function username(string $username): DatabaseConnection
  //    {
  //        $this->username = $username;
  //        return $this;
  //    }
  //
  //    public function password(string $password): DatabaseConnection
  //    {
  //        $this->password = $password;
  //        return $this;
  //    }
  //
  //    public function dbname(string $dbname): DatabaseConnection
  //    {
  //        $this->dbname = $dbname;
  //        return $this;
  //    }


  public function connect(): PDO
  {
    return $this->pdo = new PDO($this->databaseConnectionURL(), $this->username, $this->password);
  }


  private function databaseConnectionURL(): string
  {
    return 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';
  }


  /**
   * @throws Exception
   */
  private function validate(): void
  {

    if (empty($this->host) || empty($this->username) || empty($this->password)) {
      throw new Exception('You must provide at least one host, username, password.');
    }
  }


  private function __clone() {}

  private function __wakeup()
  {
    $this->pdo = $this->connect();
  }
}


//Test if the class is singleton
$databaseConnection = DatabaseConnection::getInstance();
$databaseConnection2 = DatabaseConnection::getInstance();

var_dump($databaseConnection === $databaseConnection2);

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
