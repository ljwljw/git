<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cache;
use Memcache;

class JiekouController extends Controller
{
        //登录接口
    public function jiekou(Request $request)
    {
    	//接值
    	$time2 = time();
    	$name = $request->get('name');
    	$pwd = $request->get('pwd');
    	$time = $request->get('time');
    	$sign = $request->get('sign');
    	if(($time2-$time)>5*60){
    		exit("请求超时");                                                                

    	}
    	$str = "pwd=".$pwd."&username=".$name."&time=".$time;
    	$sign1 = md5($str);
    	if($sign == $sign1 ){
    		$arr = DB::table('users')->where('username',$name)->where('pwd',$pwd)->first();
    		if($arr){
    			$token='';
    			$token = $name."wang";
    			$arr['token'] = $token;
    			//var_dump($arr);
    			return json_encode($arr);
    		}else{
    			return false;

    		}
    	}
    }
    //图片接口
    public function images(Request $request)
    {
        $time2 = time();
        $time = $request->get('time');
        $token = $request->get('token');
        if(($time2-$time)>5*60){
            exit("请求超时");
        }
        $sign = MD5('wang');
        if($sign == $token){
            $code = 1;
            $message = "成功";
            $images_arr = DB::table('images')->get();
            $str = Response::show($code,$message,$images_arr);
            return $str;
        }else{
            return "令牌错误";

        }
        
    }
    //新闻接口
    public function news(Request $request)
    {
        $time2 = time();
        $time = $request->get('time');
        $token = $request->get('token');
        if(($time2-$time)>5*60){
            exit("请求超时");
        }
        $sign = MD5('wang');
        if($sign == $token){
            $code = 1;
            $message = "成功";
            $news_arr = DB::table('news')->orderBy('new_time','desc')->get();
            $str = Response::show($code,$message,$news_arr);
            return $str;
        }else{
            return "令牌错误";
        }
    }
    //简介接口
    public function desc(Request $request)
    {
        $time2 = time();
        $time = $request->get('time');
        $token = $request->get('token');
        if(($time2-$time)>5*60){
            exit("请求超时");
        }
        $sign = MD5('wang');
        if($sign == $token){
            $code = 1;
            $message = "成功";
            $desc_arr = DB::table('desc')->get();
            $str = Response::show($code,$message,$desc_arr);
            return $str;
        }else{
            return "令牌错误";
        }
    }
    //绿色通道 的添加
    public function green(Request $request)
    {
        $data = $request->input();
        $callback = $_GET['callback'];
        $table ='green';
        echo Response::tableadd($data,$table,$callback);
    }
    //推迟报道的添加
    public function delay(Request $request)
    {
        $data = $request->input();
        $callback = $_GET['callback'];
        $table ='delay';
        echo Response::tableadd($data,$table,$callback);
        
    }
    //个人信息-个人信息的添加
    public function userinfo(Request $request)
    {
        $data = $request->input();
        $callback = $_GET['callback'];
        $table ='userinfo';
        echo Response::tableadd($data,$table,$callback);
    }
    //个人信息-宿舍预定的添加
    public function dormbook(Request $request)
    {
        $data = $request->input();
        $callback = $_GET['callback'];
        $table ='dormbook';
        echo Response::tableadd($data,$table,$callback);
    }
    //生成报告单
    public function reportcard()
    {
        $callback = $_GET['callback'];
        $sql="select * from users inner join dormbook on dormbook.uid=users.uid inner join delay on delay.uid=users.uid where user.id=1";
        $result=DB::select($sql);
        return $callback.'('.json_encode($result).')';
        
    }
    //个人信息-抵校登记的添加
    public function arrive(Request $request)
    {
        $data = $request->input();
        $callback = $_GET['callback'];
        $table ='arrive';
        echo Response::tableadd($data,$table,$callback);
    }
    //我要提问 添加
    public function tiwen(Request $request)
    {
        $time = date('Y-m-d H:i:s',time());
        $data = $request->input();
        $data['time'] = $time;
        //var_dump($data);
        $callback = $_GET['callback'];
        $table ='tiwen';
        echo Response::tableadd($data,$table,$callback);
    }
    //常见问题 查询
    public function commonquestion()
    {
        $callback = $_GET['callback'];
        $table = 'question';
        $arr = 'question';
        echo Response::tableselect($table,$callback,$arr);
    }
    //我的提问 查询
    public function myanswer()
    {
        $callback = $_GET['callback'];
        $table = 'tiwen';
        $arr = 'tiwen';
        echo Response::tableselect($table,$callback,$arr);
    }
    //常见问题 详情页面 查询
    public function uploaDate(Request $request)
    {
        $id = $request->get('id');
        $id = array('id'=>$id);
        $callback = $_GET['callback'];
        $table = 'question';
        echo Response::tablegetid($id,$table,$callback);
    }
    //咨询解答 查询
    public function answer()
    {
        $callback = $_GET['callback'];
        $table = 'question';
        $arr = 'question';
        echo Response::tableselect($table,$callback,$arr);
    }
    //咨询解答 详情页面 查询
    public function answer1(Request $request)
    {
        $id = $request->get('id');
        $id = array('id'=>$id);
        $callback = $_GET['callback'];
        $table = 'question';
        echo Response::tablegetid($id,$table,$callback);
    }
    //评论添加
    public function pinglun(Request $request){

        $data = $request->input();
        //$time = date('Y-m-d H:i:s',time());
        //$data['time'] = $time;
       //var_dump($data);
        $callback = $_GET['callback'];
        $table ='pinglun';
        echo Response::tableadd($data,$table,$callback);
    }

     //我的提问 详情页面 查询
    public function myuploaDate(Request $request)
    {
        $id = $request->get('id');
        $id = array('id'=>$id);
        $callback = $_GET['callback'];
        $table = 'tiwen';
        echo Response::tablegetid($id,$table,$callback);
    }
    //登录接口
    public function login(Request $request)
    {
        //接值 
        
        $callback = $_GET['callback'];
        $name = $request->get('username');
        $pwd = $request->get('pwd');
        $sign = $request->get('sign');
        $str = "pwd=".$pwd."&username=".$name;
        $sign1 = md5($str);
        //$id = array('pwd'=>$pwd,'username'=>$name);
        if($sign == $sign1 ){
             //echo Response::tablegetid($id,$table,$callback);
             $arr = DB::table('users')->where('username',$name)->where('pwd',$pwd)->first();
            if($arr){
                $token='';
                $token = $name."wang";
                $arr['token'] = $token;
                //var_dump($arr);
                return $callback.'('.json_encode($arr).')';
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    //修改密码
    public function change(Request $request)
    {
        $old = $request->get('old');
        $pwd = $request->get('password');
        $uid = $request->get('id');
        $callback = $_GET['callback'];
        if($callback) {
             $same = DB::table('users')->where('uid',$uid)->first();
            if($same){
                $result = DB::table('users')->where('uid',$uid)->update(['pwd'=>$pwd]);
                return  $callback.'('.json_encode($result).')';
            }else{
                $result=array('msg'=>0,'result'=>"旧密码不对");
                return  $callback.'('.json_encode($result).')';
            }
        }

    }
   

}   