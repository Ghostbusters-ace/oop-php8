<?php
namespace App\Repositories\Impl;

/**
 * UserRepository
 * @author DaCoDeMaNiaK <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 * @see App\Repositories\RepositoryInterface
 */

use \MySQLi;

use App\Repositories\RepositoryInterface;
use App\Entities\User;
use App\Db\MariaDb\MariaDb;

final class UserRepository implements RepositoryInterface
{
    public function findAll(): array
    {
        return [];
    }

    public function findOne(int $id)
    {
        return new User();
    }

    /**
     * Find a user by its login and password
     * @throw RuntimeException if query failed for any reason
     * @param String login
     * @param String password
     * @return User
     */
    public function findByLoginAndPassword(string $login, string $password): User
    {
        $sqlQuery = 'SELECT id, username, password FROM users WHERE ';
        $sqlQuery .= 'username = ? AND ';
        $sqlQuery .= 'password = PASSWORD(?);';



        // Let's connect to RDBMS
        $mariaDB = new MariaDb();
        $connection = $mariaDB->getConnection();

        // Prepare the query
        $statement = $connection->prepare($sqlQuery);

        // Bind properties
        $statement->bind_param(
            "ss",
            $login,
            $password
        );
        // Send query to RDBMS
        $statement->execute();
        $result = $statement->get_result();

        if ($result) {
            $user = new User();
            $row = $result->fetch_assoc();
            if ($row) {
                $user->setId($row['id']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);

                return $user;
            }
        }

        throw new \RuntimeException('User was not found');
    }
}