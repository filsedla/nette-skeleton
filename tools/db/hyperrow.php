<?php declare(strict_types = 1);

/** @var \Nette\DI\Container $container */
$container = require __DIR__ . '/../../app/bootstrap.php';

/** @var \Nette\Loaders\RobotLoader $robotLoader */
$robotLoader = $container->getService('robotLoader');
$robotLoader->rebuild();

/** @var \Nette\Database\IStructure $structure */
$structure = $container->getService('database.default.structure');
$structure->rebuild();

$generator = $container->createService('hyperrow.default.generator');
$generator->setExcludedClasses(array_keys($robotLoader->getIndexedClasses()));
$generator->generate();

if ($generator->isChanged()) {
    echo "Hyperrow just generated a few classes.\n";

} else {
    echo "No classes generated.\n";
}

$robotLoader->rebuild();
