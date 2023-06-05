<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Routing\RouterConfig;
use GuzzleHttp\Client; // To test HTTP request

final class RouterConfigTest extends TestCase
{
    public function testMustHaveARouteArray(): void
    {
        $routerConfig = new RouterConfig();

        $this->assertIsArray($routerConfig->getAppRoutes());
    }

    public function testDoesHaveAUserKey(): void
    {
        $routerConfig = new RouterConfig();
        $appRoutes = $routerConfig->getAppRoutes();

        $this->assertTrue(array_key_exists('user', $appRoutes));
    }

    public function testUserKeyHasArrayValue(): void
    {
        $routerConfig = new RouterConfig();
        $appRoutes = $routerConfig->getAppRoutes();

        $userRoutes = $appRoutes['user'];

        $this->assertIsArray($userRoutes);
    }

    public function testMustHaveTwoDefinedRoutes(): void
    {
        $routerConfig = new RouterConfig();

        $setupRoutes = $routerConfig->getRoutes();

        $this->assertEquals(count($setupRoutes), 2);
    }


    public function testRouteWithUserLoginFormExists(): void
    {
        $routerConfig = new RouterConfig();

        // Simulate a Client request
        $_SERVER['REQUEST_URI'] = '/user/login';
        $_SERVER['REQUEST_METHOD'] = 'GET';

        // Test matching
        $match = $routerConfig->match();

        $this->assertTrue(array_key_exists('name', $match));
        $this->assertEquals('user-login-form', $match['name']);
    }
}