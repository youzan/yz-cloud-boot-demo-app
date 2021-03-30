<?php

namespace PhpTestApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use YouzanCloudBoot\Component\BaseComponent;
use YouzanCloudBoot\Facades\ViewFacade;

class TemplateController extends BaseComponent
{

    public function example(Request $request, Response $response, $args)
    {
        return ViewFacade::render($response, 'example.twig', [
            'name' => $args['name'] ?? 'World'
        ]);
    }

    public function uploadImage(Request $request, Response $response, $args)
    {
        return ViewFacade::render($response, 'upload.twig',['kdtId' => $args['kdtId']]);
    }

    public function postForm(Request $request, Response $response, $args)
    {
        return ViewFacade::render($response, 'postform.twig');
    }



}