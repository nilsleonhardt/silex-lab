<?php

$app->get('/{_account}', 'SilexLab\Action\Index::index')
    ->bind('home');

$app->get('/', 'SilexLab\Action\Index::index')
    ->bind('home');