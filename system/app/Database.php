<?php

declare(strict_types=1);

namespace App;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
  public PDO $pdo;

  public PDOStatement $statement;

  protected static $instance = null;

  public function __construct($config = null)
  {

    $config = $config ?? Config::$DB;

    $dsnQuery = http_build_query(data: [
      'host'    => $config->host,
      'port'    => $config->port,
      'dbname'  => $config->name,
      'user'    => $config->user,
      'charset' => $config->charset,
    ], arg_separator: ';');

    $dsn = "{$config->driver}:$dsnQuery";

    try {
      $this->pdo = new PDO($dsn, password:$config->password, options:[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]);
    } catch (PDOException $error) {
      exit('<strong>Database connection error:</strong> ' . $error->getMessage());
    }
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  /**
   * QUERY
   *
   * @return $this
   */
  public function query(string $query, array $params = [])
  {

    $this->statement = $this->pdo->prepare($query);
    $this->statement->execute($params);

    return $this;
  }

  /**
   * FIND ALL
   *
   * @return mixed
   */
  public function findAll()
  {
    return $this->statement->fetchAll();
  }

  /**
   * FIND
   *
   * @return mixed
   */
  public function find()
  {
    return $this->statement->fetch();
  }
}
