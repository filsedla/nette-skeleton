<?php

namespace App\DI;

use App\BaseForm;
use Nette;

class Container extends Nette\DI\Container
{

    /**
     * Creates new instance of an injectable object (e.g. component) using autowiring. Calls injects afterwards.
     *
     * @param  string $class class
     * @param  array $constructorArgs Arguments passed to the constructor
     * @return object
     * @throws Nette\InvalidArgumentException
     */
    public function ci($class, array $constructorArgs = [])
    {
        $object = $this->createInstance($class, $constructorArgs); // does not have to be BaseControl
        $this->callInjects($object);
        return $object;
    }

    /**
     * Creates new instance of an injectable object (e.g. component) using autowiring. Calls injects afterwards.
     * Calls setup() method in the end.
     *
     * @param  string $class class
     * @param  array $constructorArgs Arguments passed to the constructor
     * @param  array $setupArgs Arguments passed to the setup() method of the new instance
     * @return object
     * @throws Nette\InvalidArgumentException
     */
    public function setupInstance($class, array $constructorArgs = [], array $setupArgs = [])
    {
        $object = $this->createInstance($class, $constructorArgs); // does not have to be BaseControl
        $this->callInjects($object);
        $this->callMethod([$object, 'setup'], $setupArgs);
        return $object;
    }

    /**
     * @return BaseForm
     */
    public function createBaseForm()
    {
        return $this->ci(BaseForm::class);
    }

}
