<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('page');
    }

    public function dashboardAdmin(): string
    {
        return view('dashboardAdmin');
    }

    public function dashboardUser(): string
    {
        return view('dashboardUser');
    }

    public function dashboardCompta(): string
    {
        return view('dashboardCompta');
    }
    
    

    
}
