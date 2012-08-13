<?php

require_once("functions.php");
$fns = new Functions();
switch ($_GET["fun"]) {
    case "login":
        
        $login = $_POST["login"];
        $pass = $_POST["password"];
        if($fns->authUser($login, $pass)){
            //print($_SESSION['name'] . " a.k.a " . $_SESSION['username']);
            header("Location: ../cms/home.php");
        } else {
            print("Errou a senha n00b");
        }
        break;
    case "logout":
        session_destroy();
        header("Location: ../cms/login.php");
        break;
}
?>
