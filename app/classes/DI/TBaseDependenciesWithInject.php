<?php

namespace App;

use Nette;

trait TBaseDependenciesWithInject
{
    use TBaseDependenciesBase;

    public function injectDependencies(
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
