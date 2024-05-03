<?php

namespace Dots\Service;

use Dots\Flow;
use Dots\User;

class ServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static array $classMap = [
        User::SERVICE => UsersService::class,
        Flow::SERVICE => FlowsService::class,
    ];

    protected function getServiceClass($name): ?string
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
