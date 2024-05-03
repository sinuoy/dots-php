<?php

namespace Dots;

use Dots\Api\Create;
use Dots\Api\Retrieve;
use Dots\Exception\InvalidMethodException;

class Flow extends DotsObject {
    const SERVICE = 'flows';

    public ?string $id;
    public ?string $user_id;
    public ?array $steps;
    public ?array $completed_steps;
    public ?string $link;
    public ?array $metadata;

    use Create;
    use Retrieve;

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
        $flow = new Flow();
        $flow->id = $array['id'] ?? null;
        $flow->user_id = $array['user_id'] ?? null;
        $flow->steps = $array['steps'] ?? null;
        $flow->completed_steps = $array['completed_steps'] ?? null;
        $flow->link = $array['link'] ?? null;
        $flow->metadata = $array['metadata'] ?? null;

        return $flow;
    }
}
