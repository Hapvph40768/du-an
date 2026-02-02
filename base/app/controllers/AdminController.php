<?php
namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        return $this->render('layout.dashboard');
    }
}
