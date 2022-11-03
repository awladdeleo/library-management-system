<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class DateForm extends Component
{
    public $name;
    public $title;
    public $placeholder;
    public $inputClass;
    public $labelClass;
    public $required;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param null $name
     * @param null $title
     * @param null $inputClass
     * @param null $labelClass
     */
    public function __construct($name = null, $title = null, $placeholder = null, $inputClass = null, $labelClass = null, $required=null,$value=null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->inputClass = $inputClass;
        $this->labelClass = $labelClass;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.date-form');
    }
}
