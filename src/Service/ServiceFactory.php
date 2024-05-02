<?php

namespace Dots\Service;

class ServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static array $classMap = [
        'users' => UsersService::class,
    ];

    protected function getServiceClass($name): ?string
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
