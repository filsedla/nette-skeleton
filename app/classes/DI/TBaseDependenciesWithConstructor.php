<?php

namespace App;

use Nette;

trait TBaseDependenciesWithConstructor
{
    use TBaseDependenciesBase;

    public function __construct(
        Nette\DI\Container $dic,
        Nette\Http\Request $httpRequest,
        Nette\Application\Application $application,
        ParametersService $parametersService,
        Database $database,
        Nette\Security\Passwords $passwords
    )
    {
        $this->dic = $dic;
        $this->httpRequest = $httpRequest;
        $this->application = $application;
        $this->parametersService = $parametersService;
        $this->database = $database;
        $this->passwords = $passwords;
    }

}
