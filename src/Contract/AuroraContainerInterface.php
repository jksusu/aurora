<?php
declare(strict_types=1);

namespace Aurora\Contract;

use Psr\Container\ContainerInterface;

interface AuroraContainerInterface extends ContainerInterface
{
    /**
     * Build container
     * @param string $name Instance name
     * @param array $params Parameters needed to build an instance
     */
    public function make(string $name, string $className,array $params = []);
}