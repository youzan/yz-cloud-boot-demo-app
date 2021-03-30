<?php

namespace PhpTestApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\UploadedFile;
use YouzanCloudBoot\Component\BaseComponent;
use YouzanCloudBoot\Facades\LogFacade;
use YouzanCloudBoot\Facades\TokenFacade;

class UploadController extends BaseComponent
{

    public function upload(Request $request, Response $response, $args)
    {
        $kdtId = $request->getParam("kdtId");
        $accessToken = TokenFacade::getAccessToken($kdtId);
        $client = new \Youzan\Open\Client($accessToken);
        $method = 'youzan.materials.storage.platform.img.upload';
        $apiVersion = '3.0.0';
        $files = $request->getUploadedFiles();
        $params = [];
        /**
         * @var UploadedFileInterface $file
         */
        $file = $files['file'];
        $tempFile = tempnam(sys_get_temp_dir(), 'upload_');
        $file->moveTo($tempFile);

        $responseUpload = $client->post($method, $apiVersion, $params, ['image' => $tempFile]);
        LogFacade::info('api upload file:debug:' . json_encode($responseUpload));
        if (isset($responseUpload['code']) && $responseUpload['code'] != 200) {
            return $response->withJson(
                ['code' => $responseUpload['code'], 'message' => $responseUpload['message'], 'data' => null]
            );
        } else {
            return $response->withJson(
                [
                    'code' => 0,
                    'message' => $responseUpload['message'],
                    'data' => ['imageUrl' => $responseUpload['data']['image_url']],
                ]
            );
        }

    }

}