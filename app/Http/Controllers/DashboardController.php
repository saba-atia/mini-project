<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $adminCount = Admin::count();

        $userCount = User::count();

        return view('dashboard', compact('adminCount', 'userCount'));
    }
}