<?php
namespace SilexLab\Repository;

use SilexLab\Entity\Account;

class AccountRepository implements AccountProvider
{
    /**
     * @var Account[]
     */
    private $accounts = array();

    public function __construct()
    {
        $this->accounts[1] = new Account(1, "Meier", "mei");
        $this->accounts[2] = new Account(2, "Mueller", "mue");
        $this->accounts[3] = new Account(3, "Fischer", "fis");
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultAccount()
    {
        return $this->accounts[1];
    }

    /**
     * {@inheritdoc}
     */
    public function findAccountForToken($token)
    {
        foreach ($this->accounts as $id => $account)
        {
            if ($account->getToken() === $token)
            {
                return $account;
            }
        }

        return null;
    }
}