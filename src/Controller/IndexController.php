<?php

namespace PhpTestApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use YouzanCloudBoot\Component\BaseComponent;
use YouzanCloudBoot\Facades\HttpFacade;

class IndexController extends BaseComponent
{

    public function index(Request $request, Response $response, $args)
    {
        return $response->withJson(['json' => 'Hello World']);
    }

}