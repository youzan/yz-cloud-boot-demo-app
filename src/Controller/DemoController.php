<?php


namespace PhpTestApp\Controller;


use Slim\Http\Request;
use Slim\Http\Response;
use Symfony\Component\Yaml\Yaml;
use Youzan\Open\Token;
use YouzanCloudBoot\Component\BaseComponent;
use YouzanCloudBoot\Constant\Env;
use YouzanCloudBoot\Facades\DBFacade;
use YouzanCloudBoot\Facades\EnvFacade;
use YouzanCloudBoot\Facades\HttpFacade;
use YouzanCloudBoot\Facades\LogFacade;
use YouzanCloudBoot\Facades\RedisFacade;
use YouzanCloudBoot\Facades\TokenFacade;

class DemoController extends BaseComponent
{

    public function env(Request $request, Response $response, $args)
    {
        return $response->withJson($_SERVER);
    }

    public function headers(Request $request, Response $response, $args)
    {
        return $response->withJson([$request->getHeaders(), getallheaders()]);
    }

    public function mysql(Request $request, Response $response, $args)
    {
        LogFacade::info("mysql...");
        DBFacade::exec("use test;");
        $arr = DBFacade::query("select * from tt limit 10");
        return $response->withJson($arr->fetchAll());
    }


    public function redis(Request $request, Response $response, $args)
    {
        LogFacade::info("redis...");
        RedisFacade::set("hello", "hello world");
        return $response->withJson([RedisFacade::get("hello"), RedisFacade::get($args['name'])]);
    }

    public function code(Request $request, Response $response, $args)
    {
        $code = $request->getParam("code");
        LogFacade::info("...code打印...");
        LogFacade::info($code);
        TokenFacade::code2Token($code);
    }

    public function token(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        return $response->withJson([TokenFacade::getAccessToken($id)]);
    }
    
    public function http(Request $request, Response $response, $args)
    {
        $resp = HttpFacade::get("https://img.yzcdn.cn/yun-web/business-cloud.png");
        return $response->withJson([$resp->getCode(), $resp->getHeadersAsList(),$resp]);
    }

    public function info(Request $request, Response $response, $args)
    {
        return $response->write(phpinfo());
    }
}