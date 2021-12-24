<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgressWork;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function employeeActivity()
    {
        $activity = ProgressWork::with('user', 'indicatorWork')->get();
        return json_encode([
           'data' => $activity
        ]);
    }
}
