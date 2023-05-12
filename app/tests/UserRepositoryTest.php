<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Repositories\Impl\UserRepository;
use App\Entities\User;


final class UserRepositoryTest extends TestCase
{
    public function testCorrectCredentials(): void
    {

        $username = 'jlaubert';
        $password = 'jlaubert';

        $repository = new UserRepository();

        $user = $repository->findByLoginAndPassword($username, $password);

        $this->assertInstanceOf(User::class, $user);
    }


    public function testBadCredentials(): void
    {

        $username = 'jlaubert';
        $password = 'toto';

        $repository = new UserRepository();

        $this->expectException(\RuntimeException::class);

        $user = $repository->findByLoginAndPassword($username, $password);
    }

    public function testInjection(): void
    {
        $username = 'jlaubert\'; -- ';
        $password = 'toto';

        $repository = new UserRepository();

        $this->expectException(\RuntimeException::class);

        $user = $repository->findByLoginAndPassword($username, $password);
    }

}