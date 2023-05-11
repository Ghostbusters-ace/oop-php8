<?php
namespace App\Http\Foundation;

/**
 * Http.php
 * @package App\Http\Foundation
 * @author DaCoDeMaNiaK <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 * 
 * Base class for HttpRequest handling
 */
use App\Http\Foundation\QueryString;

class Http
{
    /**
     * @property String uri
     * 
     * Request URI
     */
    private $uri;

    /**
     * @property String method
     * 
     * HTTP method used by the request
     */
    private $method;

    /**
     * @property \App\Http\Foundation\QueryString
     * 
     * QueryString object containing
     *  an associative array
     * 
     */
    private $queryString;

    /**
     * Constructor of base class
     * @param none
     * @return none
     */
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->queryString = new QueryString();
    }

    /**
     * Returns the request URI
     * @param none
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Returns the HTTP method of the request
     * 
     * @param none
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Returns a value passed from Client
     * @param string key you want to get
     * @return string value associated to the key if exists else null
     */
    public function get(string $key): ?string
    {
        return $this->queryString->get($key);
    }
}