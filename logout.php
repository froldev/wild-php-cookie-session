<?php
session_start();

//suppression de tous les cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

// Destruction de toutes les variables de session
$_SESSION = array();

// Destruction de la session.
session_destroy();

//return
header('Location:index.php');