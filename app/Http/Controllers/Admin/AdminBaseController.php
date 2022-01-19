<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Category;
use App\User;
use View;

use Illuminate\Http\Request;
use Auth;

class AdminBaseController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
        $userId = Auth::id();
        $this->user = Admin::getAdminProfileDetail($userId);
        $categories = Category::select('id','category')->where('status',1)->get();
        View::share('adminUser',$this->user);
        View::share('categories',$categories);

        return $next($request);
        });
    }
}
