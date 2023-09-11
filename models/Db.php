<?php
/**
 * Database handling
 */
class Db
{
    /**
     * @var PDO Variable to store connection
     */
    private static PDO $connection;
    
    /**
     * @var array Array of settings for PDO
     */
    private static array $settings = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_EMULATE_PREPARES => false,
	);
    
    /**
     * Securing connection to the database
     * @param string $host Host server
     * @param string $name Credentials for db  
     * @param string $password Password for db
     * @param string $db_name Name of db on host server
     * @return void
     * Connecting to database
     */
    public static function connect (string $host, string $name, string $password, string $db_name) : void
    {
        if (!isset(self::$connection)) {
        try {
            self::$connection = @new PDO("mysql:host=$host;dbname=$db_name", $name, $password, self::$settings);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        }
    }
    
    /**
     * Single query with return value of affected lines
     * @param string $query String of SQL query
     * @param array $parameters Parameters of the query to avoid SQL injection
     * @return type Returns number of affected lines (0/1)
     */
    public static function queryOne (string $query, array $parameters = array ()) 
    {
        $return = self::$connection->prepare($query);
        $return->execute($parameters);
        return $return->rowCount();
    }
    
    /**
     * Query that returns all relevant informations
     * @param string $query String of SQL query 
     * @param array $parameters Parameters of the query 
     * @return array Returns all relevant information as stated in the query
     */
    public static function queryAll (string $query, array $parameters = array()) : array
    {
        $return = self::$connection->prepare($query);
        $return->execute($parameters);
        return $return->fetchAll();
    }
}