<?php
declare(strict_types=1);

namespace Aurora\Di;

use Aurora\Contract\AuroraContainerInterface;

class Container implements AuroraContainerInterface
{
    private static array $container = [];

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new \Exception($id . 'not found');
        }
        // TODO: Implement get() method.
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }

    public function make(string $name, array $params)
    {
        // TODO: Implement make() method.
    }
}