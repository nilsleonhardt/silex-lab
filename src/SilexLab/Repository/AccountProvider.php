<?php
namespace SilexLab\Repository;

use SilexLab\Entity\Account;

interface AccountProvider
{
    /**
     * Returns the default account.
     *
     * @return Account
     */
    public function getDefaultAccount();

    /**
     * Find the Account for given token. Returns {@see Account} or <code>null</code>.
     *
     * @param string $token
     *
     * @return Account|null
     */
    public function findAccountForToken($token);
}