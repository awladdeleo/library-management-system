<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class CustomForm extends Component
{

    public $title;
    public $required;
    public $placeholder;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param null $title
     * @param null $value
     * @param null $placeholder
     * @param null $required
     */
    public function __construct($title=null, $value=null, $placeholder=null, $required=null)
    {
        $this->title = $title;
        $this->required = $required;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.custom-form');
    }
}
