<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MariaDbTest extends TestCase
{
    public function testMariaDbGotEnvVars(): void
    {
        $expectedString = 'dbName : app_repository' . "\n" .
            'username : app_dba';

        $mariaDb = new App\Db\MariaDb\MariaDb();
        $returnedString = $mariaDb->__toString();

        $this->assertSame($expectedString, $returnedString);
    }

    public function testMariaDbConnection(): void
    {
        $mariaDb = new App\Db\MariaDb\MariaDb();

        $this->assertIsObject($mariaDb->getConnection());
    }
}