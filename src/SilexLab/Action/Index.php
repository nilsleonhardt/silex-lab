<?php
namespace SilexLab\Action;

use Silex\Application;
use SilexLab\Entity\Account;
use Symfony\Component\HttpFoundation\Request;

class Index
{
    public static function index(Application $app, Request $request)
    {
        /** @var Account|null $account */
        $account = $request->attributes->get('_account');

        $app['monolog']->info('Account class',
            array(
                'class' => get_class($account),
            )
        );

        if ($account instanceof Account)
        {

            $app['monolog']->info('Account found',
                array(
                    'id' => $account->getId(),
                    'name' => $account->getName(),
                    'token' => $account->getToken(),
                )
            );
        }

        return "Hello World";
    }
}