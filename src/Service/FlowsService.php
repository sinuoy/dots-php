<?php

namespace Dots\Service;

use Dots\Config\Environment;
use Dots\DotsObject;
use Dots\Flow;

class FlowsService  extends AbstractService {

    public function retrieve($userId): DotsObject
    {
        return $this->fromArray($this->request('GET', sprintf("%s/%s", Environment::makePath('flows'), $userId), []));
    }

    public function create(array $data): DotsObject
    {
        return $this->fromArray($this->request('POST', Environment::makePath('flows'), $data));
    }

    /**
     * @param array $array
     * @return DotsObject
     */
    public function fromArray(array $array): DotsObject
    {
        return Flow::fromArray($array);
    }
}
