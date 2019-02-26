<?php

namespace YouzanCloudBootApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use YouzanCloudBoot\Controller\BaseController;

class IndexController extends BaseController
{

    public function index(Request $request, Response $response, $args)
    {
        return $response->withJson(['json' => 'test']);
    }

}