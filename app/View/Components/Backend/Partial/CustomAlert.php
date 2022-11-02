<?php

namespace App\View\Components\Backend\Partial;

use Illuminate\View\Component;

class CustomAlert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $background;
    public $iconText;
    public $textAlert;

    /**
     * CustomAlert constructor.
     * @param null $background
     * @param null $iconText
     * @param null $textAlert
     * @param null $title
     */
    public function __construct($background=null, $iconText=null, $textAlert=null, $title=null)
    {
        $this->title = $title;
        $this->background = $background;
        $this->iconText = $iconText;
        $this->textAlert = $textAlert;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.partial.custom-alert');
    }
}
