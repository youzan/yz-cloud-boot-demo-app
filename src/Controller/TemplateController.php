<?php

namespace YouzanCloudBootApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use YouzanCloudBoot\Component\BaseComponent;
use YouzanCloudBoot\Facades\ViewFacade;

class TemplateController extends BaseComponent
{

    public function example(Request $request, Response $response, $args)
    {
        /** @var ViewFacade $view */
        $view = $this->getContainer()->get('view');
        return $view->render($response, 'example.twig', [
            'name' => $args['name'] ?? 'World1'
        ]);
    }

}