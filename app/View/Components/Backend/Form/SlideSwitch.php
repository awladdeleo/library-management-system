<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class SlideSwitch extends Component
{
    public $label;
    public $name;
    public $value;
    public $labelClass;
    public $inputClass;

    /**
     * Create a new component instance.
     *
     * @param null $label
     * @param null $name
     * @param null $value
     * @param null $labelClass
     * @param null $inputClass
     */
    public function __construct($label=null, $name=null, $value=null, $labelClass=null, $inputClass=null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.slide-switch');
    }
}
