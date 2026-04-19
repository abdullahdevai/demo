<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show Dashboard View
     */
    public function index()
    {
        return view("admin.dashboard");
    }
}
