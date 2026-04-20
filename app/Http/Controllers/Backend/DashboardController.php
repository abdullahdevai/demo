<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show Dashboard View
     */
    public function index()
    {
        $user = Auth::user();

        return view("admin.dashboard", compact("user"));
    }
}
