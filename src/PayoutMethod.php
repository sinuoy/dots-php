<?php

namespace Dots;

use Dots\Api\All;
use Dots\Api\Create;
use Dots\Api\Retrieve;
use Dots\Exception\InvalidMethodException;

class PayoutMethod extends DotsObject {
    const SERVICE = 'payoutMethods';

    public ?string $platform;
    public ?string $routing_number;
    public ?string $account_number;
    public ?string $account_type;
    public ?string $email;
    public ?string $phone_number;

    use Create;
    use Retrieve;
    use All;

    /**
     * @throws InvalidMethodException
     */
    public static function __callStatic($method, $args) {
        if (!isset(Dots::$dotsClient)) {
            throw new \RuntimeException('Dots credentials not set');
        }

        // Check if the method exists e.g in trait
        if (method_exists(self::class, $method)) {
            return self::$method(...$args);
        }

        throw new Exception\InvalidMethodException('Method ' . $method . ' does not exist');
    }

    /**
     * @param array $array
     * @return DotsObject
     */
    public static function fromArray(array $array): DotsObject
    {
        $payoutMethod = new PayoutMethod();
        $payoutMethod->platform = $array['platform'] ?? null;
        $payoutMethod->routing_number = $array['routing_number'] ?? null;
        $payoutMethod->account_number = $array['account_number'] ?? null;
        $payoutMethod->account_type = $array['account_type'] ?? null;
        $payoutMethod->email = $array['email'] ?? null;
        $payoutMethod->phone_number = $array['phone_number'] ?? null;

        return $payoutMethod;
    }
}
