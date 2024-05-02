<?php

namespace Dots\Service;

use Dots\DotsClientInterface;
use Dots\DotsObject;

abstract class AbstractService
{
    protected DotsClientInterface $client;

    public function __construct(DotsClientInterface $client)
    {
        $this->client = $client;
    }

    public function getClient(): DotsClientInterface
    {
        return $this->client;
    }

    protected function request($method, $path, $data): array
    {
        return $this->getClient()->request($method, $path, $data);
    }

    abstract public function fromArray(array $array): DotsObject;
}

