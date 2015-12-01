<?php
namespace SilexLab\Action;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Index
{
    public static function index(Application $app, Request $request)
    {
        $app['monolog']->info('Index Action called');
        return "Hello World";
    }
}