<?php
namespace app\mobile\controller;
use think\Controller;

class Mine extends Controller
{
  public function _initialize()
  {
    $this -> assign('pageTitle', '用户');
    $this -> assign('curPageIndex', 4);
    $this -> assign('showBackBtn', true);
  }

  public function index() {
    return view();
  }

  public function edit () {
    $this -> assign('pageTitle', '设置');
    return view('edit');
  }

  public function security () {
    $this -> assign('pageTitle', '安全设置');
    return view('security');
  }

  public function diplomas () {
    $this -> assign('pageTitle', '孩子证书');
    $this -> assign('notShowFooter', true);
    return view('diplomas');
  }

}