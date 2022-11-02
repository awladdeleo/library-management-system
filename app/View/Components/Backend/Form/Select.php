<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class Select extends Component
{

    public $name;
    public $option;
    public $optionText;
    public $title;
    public $value;
    public $labelClass;
    public $inputClass;
    public $placeholder;
    public $required;

    /**
     * Create a new component instance.
     *
     * @param null $name
     * @param array $option
     * @param null $optionText
     * @param null $title
     * @param null $value
     * @param null $labelClass
     * @param null $inputClass
     * @param null $placeholder
     * @param null $required
     */
    public function __construct($name = null, $option = [], $optionText = null, $title = null, $value = null, $labelClass = null, $inputClass = null, $placeholder = null, $required = null)
    {
        $this->name = $name;
        $this->option = $option;
        $this->optionText = $optionText;
        $this->title = $title;
        $this->value = $value;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.select');
    }
}
