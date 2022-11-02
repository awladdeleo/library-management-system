<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $title;
    public $locale;
    public $value;
    public $placeholder;
    public $labelClass;
    public $inputClass;
    public $required;
    public $type;
    public $className;

    /**
     * Create a new component instance.
     *
     * @param null $type
     * @param null $name
     * @param null $title
     * @param null $value
     * @param null $labelClass
     * @param null $inputClass
     * @param null $placeholder
     * @param null $required
     * @param null $className
     */

    public function __construct($type=null ,$name=null, $title=null, $value=null, $labelClass=null, $inputClass=null, $placeholder=null, $className=null, $required=null)
    {
        $this->type = $type;
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
        return view('components.backend.form.input');
    }
}
