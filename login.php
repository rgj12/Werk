<?php

include_once 'config/init.php';
require_once 'helpers/system_helper.php';
$_SESSION['loggedIn'] = false;
$template = new Template('templates/login_temp.php');
$login = new Login;

if (isset($_POST['login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $userInfo = $login->getPass($username);
        foreach ($userInfo as $info) {
            $hashedPass = $info->password;

            if (password_verify($password, $hashedPass)) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['id'] = $info->id;
                $_SESSION['username'] = $info->username;
                $_SESSION['profiel_foto'] = $info->profiel_foto;
                $_SESSION['level'] = $info->level;
                redirect('home', 'Hallo,' . $_SESSION['username'], 'success');
            } else {
                redirect('login', 'Onjuiste gegevens', 'error');
            }
        }
    } else {
        redirect('login', 'Vul alle velden in', 'error');
    }
}
echo $template;