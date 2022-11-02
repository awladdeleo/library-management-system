<?php

namespace App\View\Components\Backend\Table\Button;

use Illuminate\View\Component;

class Show extends Component
{
    public $link;
    public $title;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param null $link
     * @param null $title
     * @param null $class
     */
    public function __construct($link=null, $title=null, $class=null)
    {
        $this->link = $link;
        $this->title = $title;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.table.button.show');
    }
}
