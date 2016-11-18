<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    //自动报道
    public function selfreport()
    {
        return view('report/self-report');
    }
    //绿色通道
    public function green()
    {
        return view('report/green');
    }
    //抵校等级
    public function arrive()
    {
        return view('report/arrive');
    }
    //推迟报道
    public function delay()
    {
        return view('report/delay');
    }
    
}