<?php

include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$_SESSION['loggedIn'] = false;
$template = new Template('templates/login_temp.php');
$login = new Login;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $username = trim(htmlspecialchars($username));
        $password = trim(htmlspecialchars($password));

        if ($login->checkCredentials($username, $password)) {
            $loggedUser = $login->userInfo($username, $password);
            foreach ($loggedUser as $logged) {
                $_SESSION['username'] = $logged->username;
                $_SESSION['loggedIn'] = true;
            }
            header('Location:index.php');
        } else {
            header('Location:login.php');
        }
    }
}
echo $template;