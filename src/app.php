<?php
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use SilexLab\Listener\AccountListener;
use SilexLab\Repository\AccountRepository;

$app->register(new UrlGeneratorServiceProvider());
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => '/tmp/monolog.log',
));

$dispatcher = $app['dispatcher']->addSubscriber(
    new AccountListener(
        new AccountRepository(),
        $app['monolog']
    )
);