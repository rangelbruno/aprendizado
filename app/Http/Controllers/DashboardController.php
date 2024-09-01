<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('dashboard')], // Supondo que 'home' seja uma rota definida
            ['title' => 'Dashboard', 'url' => '#']
        ];


        return view('dashboard.index');
    }

}
