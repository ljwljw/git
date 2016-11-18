<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    //入学须知
    public function mustknow()
    {
        return view('data/mustknow');
    }
    //通知报告
    public function notice()
    {
        return view('data/notice');
    }
    //资料下载
    public function data()
    {
        return view('data/data');
    }
    //咨询报告
    public function ask()
    {
        return view('data/ask');
    }
    //常见问题
    public function commonquestion()
    {
        return view('data/commonquestion');
    }
    //常见问题 详情页
    public function uploaDate()
    {
        return view('data/uploaDate');
    }
    //咨询解答
    public function answer()
    {
        return view('data/answer');
    }
    //我要提问
    public function tiwen()
    {
        return view('data/tiwen');
    }
    //我的提问
    public function myanswer()
    {
        return view('data/myanswer');
    }
    //我的提问 详情页
    public function myuploaDate()
    {
        return view('data/myuploaDate');
    }

}