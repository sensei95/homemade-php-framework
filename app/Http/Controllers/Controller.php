<?php

namespace App\Http\Controllers;

use App\Views\View;
use Doctrine\ORM\EntityManager;

class Controller
{
    protected View $view;
    protected EntityManager $entityManager;

    public function __construct(View $view, EntityManager $entityManager)
    {
        $this->view = $view;
        $this->entityManager = $entityManager;
    }
}
