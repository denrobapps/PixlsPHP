<?php
include("includes/init.php");

$app = new app();
$app->init_facebook();
$app->init_user();

$app->facebook->ensure_login();

echo $app->user->user_id;