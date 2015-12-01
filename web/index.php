<?php
use Silex\Application;
use SilexLab\Listener\AccountListener;
use SilexLab\Repository\AccountRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();
$app['debug'] = true;

require_once __DIR__ . '/../src/routes.php';
require_once __DIR__ . '/../src/app.php';

$app->run();