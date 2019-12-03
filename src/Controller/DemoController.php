<?php


namespace YouzanCloudBootApp\Controller;


use Slim\Http\Request;
use Slim\Http\Response;
use YouzanCloudBoot\Component\BaseComponent;
use YouzanCloudBoot\Facades\DBFacade;
use YouzanCloudBoot\Facades\HttpFacade;
use YouzanCloudBoot\Facades\LogFacade;
use YouzanCloudBoot\Facades\RedisFacade;

class DemoController extends BaseComponent
{
    public function env(Request $request, Response $response, $args)
    {
        return $response->withJson($_SERVER);
    }


    public function apollo(Request $request, Response $response, $args)
    {
        $api = $args['api'] ?? 'youzan.proxy.token';
        $env = $this->getEnvUtil();
        $v = $env->getFromApollo($api);
        return $response->withJson($v);
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
        RedisFacade::set("test", "123");
        $v = RedisFacade::get("test");
        return $response->withJson($v);
    }


    public function proxyHttp(Request $request, Response $response, $args)
    {
        $url = "https://baidu.com";
        $v = HttpFacade::get($url);
        return $response->withJson([
            'headers' => $v->getHeaders(),
            'body' => $v->getBody()
        ]);
    }

}