<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $name;
    public $title;
    public $isChecked;

    /**
     * Create a new component instance.
     *
     * @param null $name
     * @param null $title
     * @param null $isChecked
     */
    public function __construct($name = null, $title = null,$isChecked = null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->isChecked = $isChecked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.form.checkbox');
    }
}
