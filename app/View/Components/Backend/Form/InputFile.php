<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class InputFile extends Component
{

    public $name;
    public $title;
    public $value;
    public $path;
    public $placeholder;
    public $required;
    public $text;
    public $labelClass;
    public $inputClass;

    /**
     * Create a new component instance.
     *
     * @param null $name
     * @param null $title
     * @param null $value
     * @param null $labelClass
     * @param null $inputClass
     * @param null $path
     * @param null $placeholder
     * @param null $required
     * @param null $text
     */

    public function __construct($name = null, $title = null, $value = null, $labelClass = null, $inputClass = null, $path = null, $placeholder = null, $required = null, $text = null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = $value;
        $this->path = $path;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->text = $text;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.input-file');
    }
}
