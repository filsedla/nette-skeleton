<?php declare(strict_types = 1);

/** @var \Nette\DI\Container $container */
$container = require __DIR__ . '/../../app/bootstrap.php';

/** @var \Filsedla\DbTool\DbTool $dbTool */
$dbTool = $container->createInstance(\Filsedla\DbTool\DbTool::class, [
    $container->getService('database.default.context'), // Context of the database to dump
    __DIR__ // DB Dump directory
]);

$dbTool->process(); // Run
