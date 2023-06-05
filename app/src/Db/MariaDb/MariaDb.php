<?php
namespace App\Db\MariaDb;

/**
 * MariaDb
 * @author DaCoDeMaNiaK <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 * 
 * Concrete class connecting to MariaDb server
 * Extends Db (@see App\Db\Db)
 */

// Imports
use App\Db\Db;
use \MySQLi;

final class MariaDb extends Db
{
    public function __construct()
    {
        parent::__construct();
        $this->doConnect();
    }

    /**
     * @see App\Db\Db::doConnect()
     */
    protected function doConnect(): void
    {
        $this->connection = new MySQLi(
            $this->address,
            $this->username,
            $this->password,
            $this->dbName
        );

        if ($this->connection->connect_error) {
            /* Use your preferred error logging method here */
            error_log('Connection error: ' . $this->connection->connect_error);
        }
    }

    public function __toString(): string
    {
        return 'dbName : ' . $this->dbName . "\n" .
            'username : ' . $this->username;
    }
}