<?php declare(strict_types = 1);

namespace App;

use Nette\Utils\Strings;

/**
 *
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
    use TBaseDependenciesWithConstructor;

    protected function startup()
    {
        parent::startup();
    }

    /**
     * @return string
     */
    public function getFullViewName()
    {
        return Strings::webalize("view-{$this->name}-{$this->view}");
    }

}
