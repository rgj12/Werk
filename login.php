<?php

include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$_SESSION['loggedIn'] = false;
$template = new Template('templates/login_temp.php');
$login = new Login;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userInfo = $login->dehashPass($username);
    foreach ($userInfo as $info) {
        $hashedPass = $info->password;
        echo $hashedPass;
    }
}
echo $template;