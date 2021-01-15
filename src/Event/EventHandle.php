<?php
declare(strict_types=1);

namespace Aurora\Event;

class EventHandle
{
    protected static $selfEvent = false;

    public function handle($handle, ...$args)
    {
        $function = $args[0];
        if (!self::$selfEvent) {
            container(Event::class)->{$function}($handle, ...$args);
            self::$selfEvent = true;
        }
    }
}