<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;

class UserController extends Controller
{
    public function actionLogin(){
       
        return $this->render('login');
    }
    /*
    *调接口  完成登录 返回token
     */
    public function  actionLogin_pro(){
        $request = yii::$app->request;
        $time = time();
        $arr = $request->post();
        unset($arr['_csrf']);
        //去空
        $arr = $this->qukong($arr); 
        //排序
        ksort($arr); 
        //拼接
        $arr = $this->pinjie($arr,$time);
        //print_r($arr);die;
        $sign = md5($arr);
        $name = $request->post('username');
        $pwd = $request->post('pwd');
        //调接口
        $url = "http://www.wsc.com/shixun/jiekou/laravel/public/jiekou?name=$name&pwd=$pwd&time=$time&sign=$sign";
        //echo $url;die;
        $str =  file_get_contents($url);
        //$str = json_decode($str,true);
        //写入日志
        $path ="../public/blog".rand(1,20).".txt";
        file_put_contents($path, $str);
        $arr = json_decode($str,true);
        $token = $arr['token'];
        if(isset($token)){
            $session = Yii::$app->session;
            $session['token']=$token;
            echo "登录成功";
            //return $this->redirect(array('User/lists'));
        }
    }
    //展示
    public function actionLists(){
        echo "123";
    }

    //去空
    public function qukong($arr){
        foreach ($arr as $k => $v) {
            if($v==''){
                unset($arr[$k]);
            }
        }
        return $arr;
    }
    //排序
    public function ksort($arr){
        $arr = ksort($arr);
        return $arr;
    }
    //拼接
    public function pinjie($arr,$time){
        $array = "";
        foreach ($arr as $key => $val) {
            $array .=$key."=".$val."&";
        }
        //去掉最后一个&符号
        //或者 $array = rtrim($array,'&');
        $array = substr($array,0,count($array)-2);
        return $array."&time=$time";
    }

}
