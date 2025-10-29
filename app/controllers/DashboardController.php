<?php

class DashboardController
{
    public function contacto()
    {
        require '../app/views/home/contacto.php';
    }

    public function home()
    {
        require '../app/views/home/index.php';
    }

    public function index()
    {
        require '../app/views/dashboard/index.php';
    }

}
