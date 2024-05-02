<?php

namespace Dots;

interface DotsClientInterface
{
    public function request(string $method, string $path, array $data = []): array;
}
