<?php

namespace App;

use App;
use Nette;

trait TBaseDependenciesBase
{
    /** @var App\DI\Container (Note: service of type Nette\DI\Container must be injected instead!) */
    protected $dic;

    /** @var Nette\Http\Request (Nette\Http\IRequest) */
    protected $httpRequest;

    /** @var Nette\Application\Application */
    protected $application;

    /** @var App\ParametersService */
    protected $parametersService;

    /** @var App\Database */
    protected $database;

    /** @var Nette\Security\Passwords */
    protected $passwords;

//    /** @var App\Mailer */
//    protected $mailer;
//
//    /** @var App\TemplateFactory */
//    protected $templateFactory;
//
//    /** @var App\Application\Context */
//    protected $context;
//
//    /** @var App\TimeService */
//    protected $timeService;

//    /** @var App\Http\CookieManager */
//    protected $cookieManager;


}
