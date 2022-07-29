<?php

namespace App\Http\Controllers;

use App\Views\View;

class Controller
{
    protected View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }
}
