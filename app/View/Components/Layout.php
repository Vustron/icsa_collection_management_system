<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Layout extends Component
{
    // public $page_title; // if usabon ninyu ang default
    // public $raw_css_link;
    // public $js_link;

    public function __construct($page_title = null, $raw_css_link = null, $js_link = null)
    {
        // utot di mo work
        // $this->page_title = $page_title ?? "ICCMS";
        // $this->raw_css_link = $raw_css_link;
        // $this->js_link = $js_link;
    }


    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
