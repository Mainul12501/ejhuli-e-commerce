<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordSettingController extends AdminDashboardController
{
    public function index()
    {
        return view('admin.setting.password-setting');
    }
}
