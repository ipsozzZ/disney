<?php
namespace app\mobile\controller;

use think\Controller;
use think\Cookie;
use app\common\controller\User;
use function Qiniu\json_decode;

class Login extends Controller
{
  public function _initialize () {
    $this -> assign('notShowFooter', false); // 显示footer
    $this -> assign('curPageIndex', 4);
  }


  public function index ($name = '', $pass = '') {
    $this -> assign('status', 0); //未登录
    $this -> assign('pageTitle', '登录');
    if($name != '' && $pass != '') {
      $userModel = new User();
      $token = $userModel -> login($name, $pass);
      $token = json_decode($token);
      if($token['status']) {
        //登录成功
        //设置cookie
        cookie('disney_token', $token['token']);
        $this -> assign('status', 1);
        return $this -> redirect('/mobile/mine');
      } else {
        //登录失败
        $this -> assign('status', -1);
        return view('index');
      }
    }
    return view();
  }

}