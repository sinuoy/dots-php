<?php

namespace Dots\Service;

use Dots\Collection;
use Dots\Config\Environment;
use Dots\DotsObject;
use Dots\User;

class UsersService  extends AbstractService {

    public function retrieve($userId): DotsObject
    {
        return $this->fromArray($this->request('GET', sprintf("%s/%s", Environment::makePath('users'), $userId), []));
    }

    public function create(array $data): DotsObject
    {
        return $this->fromArray($this->request('POST', Environment::makePath('users'), $data));
    }

    public function all(array $params = []): DotsObject
    {
        $response = $this->request('GET', Environment::makePath('users'), $params);
        $collection = new Collection();

        if (!empty($response['data'])) {
            foreach ($response['data'] as $item) {
                $collection->addItem($this->fromArray($item));
            }
        }

        $collection->setHasMore($response['has_more'] ?? false);

        return $collection;
    }

    public function addComplianceInformation($userId, array $data): DotsObject
    {
        return $this->fromArray($this->request('PUT', sprintf("%s/%s/compliance", Environment::makePath('users'), $userId), $data));
    }

    /**
     * @param array $array
     * @return DotsObject
     */
    public function fromArray(array $array): DotsObject
    {
       return User::fromArray($array);
    }
}
