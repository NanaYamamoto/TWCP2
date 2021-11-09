<?php
namespace App\Http\Controllers\Operate;

use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    public function index(){
        $view = view('operate.dashboard');
        return $view;
    }
}