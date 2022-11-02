<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class FormButton extends Component
{

    public $submit;
    public $reset;
    public $className;

    /**
     * Create a new component instance.
     *
     * @param null $submit
     * @param null $reset
     * @param null $className
     */

    public function __construct($className=null, $submit=null, $reset=null)
    {
        $this->submit = $submit;
        $this->reset = $reset;
        $this->className = $className;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.form-button');
    }
}
