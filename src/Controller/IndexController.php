<?php

namespace YouzanCloudBootApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use YouzanCloudBoot\Component\BaseComponent;

class IndexController extends BaseComponent
{

    public function index(Request $request, Response $response, $args)
    {
        return $response->withJson(['json' => 'test']);
    }

}