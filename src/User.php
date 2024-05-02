<?php

namespace Dots;

use Dots\Api\All;
use Dots\Api\Create;
use Dots\Api\Retrieve;
use Dots\Exception\InvalidMethodException;

class User extends DotsObject {
    const SERVICE = 'users';

    public ?string $id;
    public ?string $email;
    public ?string $first_name;
    public ?string $last_name;
    public ?PhoneNumber $phone_number;
    public ?array $wallet;
    public ?array $metadata;

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
        $user = new User();
        $user->id = $array['id'] ?? null;
        $user->email = $array['email'] ?? null;
        $user->first_name = $array['first_name'] ?? null;
        $user->last_name = $array['last_name'] ?? null;
        $user->phone_number = isset($array['phone_number']) ? PhoneNumber::fromArray($array['phone_number']) : null;
        $user->wallet = $array['wallet'] ?? null;
        $user->metadata = $array['metadata'] ?? null;

        return $user;
    }
}
