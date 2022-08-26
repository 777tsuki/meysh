<?php
$app=1;
require 'route.php';
$route = new Router();
$route->get('/notice',function () {
  echo '$newside ==== ';
});
$route->get('/notice/{id}',function ($id) {
  echo '$newsideeeeeeeeeeeeeee ==== '.$id;
});
$route->dispatch();
?>