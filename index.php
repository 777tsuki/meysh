<?php
require 'route.php';
$route = new Router();
$route->get('/noti',function () {
  echo '$newside ==== ';
});
$route->get('/noti/{id}',function ($id) {
  echo '$newsideeeeeeeeeeeeeee ==== '.$id;
});
$route->dispatch();
?>