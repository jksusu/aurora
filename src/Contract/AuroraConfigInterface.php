<?php
declare(strict_types=1);

namespace Aurora\Contract;

interface AuroraConfigInterface
{
    /**
     * get config params
     * @param string $keys  params
     * @return mixed
     */
    public function get(string $keys);
}