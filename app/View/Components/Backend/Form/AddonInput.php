<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class AddonInput extends Component
{
    public $name;
    public $title;
    public $value;
    public $placeholder;
    public $labelClass;
    public $inputClass;
    public $required;
    public $className;

    /**
     * Create a new component instance.
     *
     * @param null $name
     * @param null $title
     * @param null $value
     * @param null $labelClass
     * @param null $inputClass
     * @param null $placeholder
     * @param null $required
     * @param null $className
     */

    public function __construct($name=null, $title=null, $value=null, $labelClass=null, $inputClass=null, $placeholder=null, $className=null, $required=null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = $value;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->className = $className;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.addon-input');
    }
}
