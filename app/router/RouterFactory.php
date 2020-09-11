<?php declare(strict_types = 1);

namespace App;

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;

final class RouterFactory
{
    use \Nette\StaticClass;

    public static function createRouter(): RouteList
    {
        $router = new RouteList;

        $router[] = new Route('<presenter>/<action>[/<id>]', 'Home:default');

        return $router;
    }
}
