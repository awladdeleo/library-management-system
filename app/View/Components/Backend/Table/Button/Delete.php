<?php

namespace App\View\Components\Backend\Table\Button;

use Illuminate\View\Component;

class Delete extends Component
{
    public $title;
    public $class;
    public $id;
    public $name;
    public $message;

    /**
     * Create a new component instance.
     *
     * @param null $title
     * @param null $class
     * @param null $id
     * @param null $name
     * @param null $message
     */
    public function __construct($title=null, $class=null, $id=null, $name=null, $message=null)
    {
        $this->title = $title;
        $this->class = $class;
        $this->id = $id;
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.table.button.delete');
    }
}
