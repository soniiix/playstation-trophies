<?php

namespace Tustin\Haste;

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;

use GuzzleHttp\HandlerStack;
use Tustin\Haste\Http\HttpClient;
use Tustin\Haste\Http\Middleware\AuthenticationMiddleware;
use Tustin\Haste\Http\Middleware\ResponseHandlerMiddleware;

abstract class AbstractClient extends HttpClient
{
    protected array $guzzleOptions;

    public function __construct($guzzleOptions = [])
    {
        if (!isset($guzzleOptions['handler'])) {
            $guzzleOptions['handler'] = HandlerStack::create();
        }

        $this->guzzleOptions = $guzzleOptions;

        $this->httpClient = new Client($this->guzzleOptions);

        $handler = $this->getHandler();

        $handler->push(
            Middleware::mapResponse(
                new ResponseHandlerMiddleware
            )
        );
    }

    /**
     * Gets the HandlerStack for the Guzzle client.
     * 
     * Will create one if it does not exist.
     *
     * @return HandlerStack
     */
    protected final function getHandler(): HandlerStack
    {
        $config = $this->httpClient->getConfig();

        if (is_null($config['handler'])) {
            $config['handler'] = HandlerStack::create();
        }

        return $config['handler'];
    }

    /**
     * Pushes an AuthenticationMiddleware onto the Guzzle client HandlerStack for authenticated requests.
     *
     * @param AuthenticationMiddleware $middleware
     * @return void
     */
    protected final function pushAuthenticationMiddleware(AuthenticationMiddleware $middleware): void
    {
        $handler = $this->getHandler();
        $handler->push(
            Middleware::mapRequest(
                $middleware
            )
        );
    }
}
