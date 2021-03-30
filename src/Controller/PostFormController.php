<?php

namespace PhpTestApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\UploadedFile;
use YouzanCloudBoot\Component\BaseComponent;

class PostFormController extends BaseComponent
{

    public function submit(Request $request, Response $response, $args)
    {

        return $response->withJson(
            [
                'args' => $args,
                'data' => [
                    $request->getAttributes(),
                    $request->getParsedBody(),
                    $request->getContentLength(),
                    $request->getCookieParams(),
                    $request->getHeaders(),
                    $request->getQueryParams(),
                    $request->getServerParams(),
                ],
                'r' => json_encode($request)
            ]
        );
    }

}