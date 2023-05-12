<?php
namespace App\Db;

/**
 * Db.php
 * @author DaCoDeMaNiaK <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 * 
 * Abstract class for db connections
 */

// Imports
use App\Utils\Files\DotEnv;

abstract class Db
{
    /**
     * @property String
     * 
     * Address of the Db Host (default localhost)
     */
    protected $address = 'localhost';

    /**
     * @property String
     * 
     * Db user authorized to connect to
     */
    protected $username;

    /**
     * @property String
     * 
     * Db password for previous user
     */
    protected $password;

    /**
     * @property String
     * 
     * Target db name
     */
    protected $dbName;

    /**
     * @property mixed
     * 
     * Instance of Db Connection
     * Maybe null
     */
    protected $connection;

    public function __construct()
    {
        // Sets properties from dotEnv
        $this->_loadFromDotEnv();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Do real connection to target RDBMS
     * @param none
     * @return void
     */
    protected abstract function doConnect(): void;

    /**
     * Load environment vars from the .env file
     * @param none
     * @return void
     */
    private function _loadFromDotEnv(): void
    {
        // Load datas from DotEnv
        try {
            DotEnv::load();

            $this->username = $_ENV['MARIADB_USER'];
            $this->password = $_ENV['MARIADB_PASSWORD'];
            $this->dbName = $_ENV['MARIADB_DATABASE'];
            $this->address = $_ENV['MARIADB_HOST'];

        } catch (\RuntimeException $e) {
            echo 'Fatal error : ' . $e->getMessage();
            die();
        }
    }
}