<?php
namespace SilexLab\Listener;

use Monolog\Logger;
use SilexLab\Repository\AccountProvider;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AccountListener implements EventSubscriberInterface
{

    /**
     * @var AccountProvider
     */
    private $accountProvider;

    /**
     * @var Logger
     */
    private $logger;

    public function __construct(AccountProvider $accountProvider, Logger $logger)
    {
        $this->accountProvider = $accountProvider;
        $this->logger = $logger;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $defaultAccount = $this->accountProvider->getDefaultAccount();

        $token = $request->attributes->get('_account');
        $this->logger->info("Token", array('token' => $token));

        $account = $this->accountProvider->findAccountForToken($token);

        if (!$account)
        {
            $account = $defaultAccount;
        }

        $request->attributes->set('_account', $account);
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array(
                array('onKernelRequest', 17)
            ),
        );
    }
}