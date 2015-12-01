<?php

$app->get('/{_account}', 'SilexLab\Action\Index::index')
    ->bind('home');