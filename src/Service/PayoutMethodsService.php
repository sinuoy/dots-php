<?php

namespace Dots\Service;

use Dots\Collection;
use Dots\Config\Environment;
use Dots\DotsObject;
use Dots\PayoutMethod;
use Dots\User;

class PayoutMethodsService  extends AbstractService {

    public function create(string $userId, array $data): DotsObject
    {
        return $this->fromArray($this->request('POST', Environment::makePath(sprintf('users/%s/payout-methods', $userId)), $data));
    }

    /**
     * @param array $array
     * @return DotsObject
     */
    public function fromArray(array $array): DotsObject
    {
        dd($array);
        return PayoutMethod::fromArray($array);
    }
}
