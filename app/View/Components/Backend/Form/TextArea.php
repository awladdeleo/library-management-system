<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class TextArea extends Component
{
    public $name;
    public $title;
    public $value;
    public $inputClass;
    public $labelClass;
    public $placeholder;
    public $required;
    public $class;

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
     * @param null $class
     */

    public function __construct($name=null, $title=null, $value=null, $labelClass=null, $inputClass=null, $placeholder=null, $required=null, $class=null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = $value;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.text-area');
    }
}
