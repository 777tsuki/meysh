<?php
$content=$page=$link="meysh";
ob_start();
session_start();
include '../mysql.php';
include 'php/information.php';
include 'route.php';
$route = new Router();
$route->get('/',function () {
  $GLOBALS['content']='php/index.php';
  $GLOBALS['page']='首页';
});
$route->get('/user',function () {
  $GLOBALS['content']='php/user.php';
  $GLOBALS['page']='船员';
});
$route->get('/link',function () {
  $GLOBALS['content']='php/link.php';
  $GLOBALS['page']='事务处';
});
$route->get('/link/{id}',function ($id) {
  header("location:../link?target=$id");
});
$route->get('/error',function () {
  $GLOBALS['content']='errorpage.html';
  $GLOBALS['page']='事故';
});
$route->get('/notice/{id}',function ($id) {
  header("location:../notice?uid=$id");
});
$route->get('/notice',function () {
  $GLOBALS['content']='php/notice.php';
  $GLOBALS['page']='公告';
});
$route->get('/course',function () {
  header("location:error");
});
$route->get('/forum',function () {
  header("location:error");
});
$route->dispatch();
include 'view/frame.php';
?>