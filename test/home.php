<?php
session_start();
$content = file_get_contents('home.html');
$auth_buttons = '';

if (!isset($_SESSION['user_id'])) {
    $auth_buttons = '
        <button id="loginBtn" onclick="redirectToLogin()">Log in</button>
        <button id="signupBtn" onclick="redirectToSignup()">Sign up</button>
        <div id="user-avatar" class="hidden"></div>
    ';
} else {
    $auth_buttons = '
        <button id="loginBtn" onclick="redirectToLogin()" class="hidden">Log in</button>
        <button id="signupBtn" onclick="redirectToSignup()" class="hidden">Sign up</button>
        <div id="user-avatar">' . $_SESSION['user_name'][0] . '</div>
    ';
}

$content = str_replace("<!--auth_buttons-->", $auth_buttons, $content);
echo $content;
?>
