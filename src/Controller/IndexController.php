<?php

namespace YouzanCloudBootApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use YouzanCloudBoot\Component\BaseComponent;

class IndexController extends BaseComponent
{

    public function index(Request $request, Response $response, $args)
    {
        $clientId = "4739341b302fbdaacc";
        $clientSecret = "fcb7f70afc1950ea48639732964cec9e";

        $type = 'silent';
        $keys['kdt_id'] = '42128639';

        $accessToken = (new \Youzan\Open\Token($clientId, $clientSecret))->getToken($type, $keys);
        var_dump($accessToken);
        return $response->withJson(['json' => 'test', 'token' => $accessToken]);
    }

}