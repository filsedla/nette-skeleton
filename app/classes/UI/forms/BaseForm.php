<?php declare(strict_types = 1);

namespace App;


class BaseForm extends \Nette\Application\UI\Form
{

    public function __construct()
    {
        parent::__construct();

        //$this->setRenderer();
        $this->onRender[] = [$this, 'makeBootstrap4'];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasControl($name)
    {
        return (bool)$this->getComponent($name, false);
    }

    /**
     * https://github.com/nette/forms/blob/master/examples/bootstrap4-rendering.php
     */
    public function makeBootstrap4(\Nette\Application\UI\Form $form)
    {
        /** @var \Nette\Forms\Rendering\DefaultFormRenderer $renderer */
        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = null;
        $renderer->wrappers['pair']['container'] = 'div class="form-group row"';
        $renderer->wrappers['pair']['.error'] = 'has-danger';
        $renderer->wrappers['control']['container'] = 'div class=col-sm-9';
        $renderer->wrappers['label']['container'] = 'div class="col-sm-3 col-form-label"';
        $renderer->wrappers['control']['description'] = 'span class=form-text';
        $renderer->wrappers['control']['errorcontainer'] = 'span class=form-control-feedback';
        $renderer->wrappers['control']['.error'] = 'is-invalid';

        foreach ($form->getControls() as $control) {
            $type = $control->getOption('type');
            if ($type === 'button') {
                $control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn btn-secondary');
                $usedPrimary = true;

            } elseif (in_array($type, ['text', 'textarea', 'select'], true)) {
                $control->getControlPrototype()->addClass('form-control');

            } elseif ($type === 'file') {
                $control->getControlPrototype()->addClass('form-control-file');

            } elseif (in_array($type, ['checkbox', 'radio'], true)) {
                if ($control instanceof \Nette\Forms\Controls\Checkbox) {
                    $control->getLabelPrototype()->addClass('form-check-label');
                } else {
                    $control->getItemLabelPrototype()->addClass('form-check-label');
                }
                $control->getControlPrototype()->addClass('form-check-input');
                $control->getSeparatorPrototype()->setName('div')->addClass('form-check');
            }
        }
    }

    // /**
    //  * @param $presenter
    //  */
    // protected function attached($presenter)
    // {
    //     parent::attached($presenter);
    //
    //     if ($presenter instanceof Nette\Application\UI\Presenter) {
    //
    //         $this->onRender[] = [$this, 'makeBootstrap4'];
    //
    //         // Convert all form errors to presenter flash messages
    //         $this->onValidate[] = function (self $form, $values) use ($presenter) {
    //             foreach ($form->getErrors() as $error) {
    //                 $presenter->flashMessage($error, 'danger');
    //             }
    //         };
    //     }
    // }

}
