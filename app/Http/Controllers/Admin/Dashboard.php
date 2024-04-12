<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => ['Dashboard'],
            'content' => 'This is the dashboard page'
        ];
        return view('admin.dashboard', $data);
    }
}
