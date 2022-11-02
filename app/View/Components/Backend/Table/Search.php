<?php

namespace App\View\Components\Backend\Table;

use Illuminate\View\Component;

class Search extends Component
{

    public $search;
    public $placeholder;
    public $buttonUrl;
    public $buttonText;
    /**
     * Create a new component instance.
     *
     * @param null $search
     * @param null $placeholder
     * @param null $buttonUrl
     * @param null $buttonText
     */
    public function __construct($search=null, $placeholder=null, $buttonUrl=null, $buttonText=null)
    {
        $this->search = $search;
        $this->placeholder = $placeholder;
        $this->buttonUrl = $buttonUrl;
        $this->buttonText = $buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.table.search');
    }
}
