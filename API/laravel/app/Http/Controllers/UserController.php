<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //首页展示
    public function index()
    {
        $time = time();
        //轮播图片 调用接口
        $images_url = "http://www.wsc.com/shixun/jiekou/laravel/public/images?token=e08392bb89dedb8ed6fb298f8e729c15&time=$time";
        //echo $images_url;die;
        $images_str = file_get_contents($images_url);
        $images_arr = json_decode($images_str,true);
       // print_r($images_str);die;
        if($images_arr['code']==1){
            $images_arr = $images_arr['data'];
        }
        //调用简介展示 接口
        $desc_url = "http://www.wsc.com/shixun/jiekou/laravel/public/desc?token=e08392bb89dedb8ed6fb298f8e729c15&time=$time";
        $desc_str = file_get_contents($desc_url);
        $desc_arr = json_decode($desc_str,true);
        if($desc_arr['code']==1){
            $desc_arr = $desc_arr['data'];
        }
        //调用新闻展示 接口
        $news_url = "http://www.wsc.com/shixun/jiekou/laravel/public/news?token=e08392bb89dedb8ed6fb298f8e729c15&time=$time";
        $news_str = file_get_contents($news_url);
        $news_arr = json_decode($news_str,true);
        if($news_arr['code']==1){
            $news_arr = $news_arr['data'];
        }
      //  print_r($news_str);die;
        return view('index/index',['images_arr'=>$images_arr,'news_arr'=>$news_arr,'desc_arr'=>$desc_arr]);
    }
    //用户个人中心
    public function usercenter()
    {
        return view('user/user-center');
    }
    //修改密码
    public function changepsw()
    {
        return view('user/changepsw');
    }
    //个人信息
    public function userinfo()
    {
        return view('user/user-info');
    }
    //宿舍预定
    public function dormbook()
    {
        return view('user/dorm-book');
    }
    //报到单
    public function reportcard()
    {
        return view('user/reportcard');
    }
    //自助入学
    public function entrance()
    {
        return view('user/entrance');
    }
    //查找路线
    public function routes()
    {
        return view('user/route');
    }

}