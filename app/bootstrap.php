<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/functions.php';

$configurator = new Nette\Configurator();

$configurator->enableTracy(__DIR__ . '/../log');

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$robotLoader = $configurator->createRobotLoader();
$robotLoader
    ->addDirectory(__DIR__)
    ->register();

$configurator->addServices(['robotLoader' => $robotLoader]);

$configurator->addConfig(__DIR__ . '/config/common.neon');
$configurator->addConfig(__DIR__ . '/config/local.neon');

$container = $configurator->createContainer();

return $container;
