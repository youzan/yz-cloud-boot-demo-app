<?php


namespace YouzanCloudBootApp\Middleware;


use YouzanCloudBoot\Facades\LogFacade;

class ExampleMiddleware
{
    /**
     * Example middleware invokable class
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request PSR7 request
     * @param \Psr\Http\Message\ResponseInterface $response PSR7 response
     * @param callable $next Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        LogFacade::info("before request: " . $request->getUri());
        $response = $next($request, $response);
        LogFacade::info("after request: " . $request->getUri());

        return $response;
    }
}