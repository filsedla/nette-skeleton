<?php

namespace App;

use Nette;

class ParametersService
{
    use Nette\SmartObject;

    /** @var array */
    private $parameters;

    /**
     * @param Nette\DI\Container $container
     */
    public function __construct(Nette\DI\Container $container)
    {
        $this->parameters = $container->getParameters();
    }

    /**
     * @param string $key parameter name (may contain dots to access subarrays)
     * @return mixed
     */
    public function get($key)
    {
        return Nette\DI\Helpers::expand($key, $this->parameters, false);
    }

    // /**
    //  * TODO
    //  */
    // public function has($key)
    // {
    //
    // }

}
