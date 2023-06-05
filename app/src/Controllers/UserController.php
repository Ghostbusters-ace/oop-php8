<?php
namespace App\Controllers;

/**
 * UserController
 *  Endpoints for user handling
 */
final class UserController
{

    /**
     * Do a login form
     * @return string
     */
    public function loginForm(): string
    {
        return 'Return HTML form for login and password';
    }

    public function loginProcess(): string
    {
        return 'Process login form';
    }

}