<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clients;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $clientscount = clients::count();
        return view('admin.dashboard', compact('clientscount'));
    }
}
