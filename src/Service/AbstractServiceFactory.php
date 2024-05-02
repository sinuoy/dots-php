<?php

namespace Dots\Service;

use Dots\DotsClientInterface;

abstract class AbstractServiceFactory
{
    private DotsClientInterface $client;

    private array $services;

    public function __construct(DotsClientInterface $client)
    {
        $this->client = $client;

        $this->services = [];
    }

    abstract protected function getServiceClass($name): ?string;

    public function __get(string $name)
    {
        $serviceClass = $this->getServiceClass($name);
        if (null !== $serviceClass) {
            if (!\array_key_exists($name, $this->services)) {
                $this->services[$name] = new $serviceClass($this->client);
            }

            return $this->services[$name];
        }

        \trigger_error('Undefined property: ' . static::class . '::$' . $name);

        return null;
    }
}
