
<?php
if (!empty($_SESSION['user'])) {
    header("Location: home.php");
}
?>

<html>
    <title>CMS Mobile Web | Login no Sistema</title>
    <head>
        
    </head>
    <body>
        <form>
            <label>Login:</label>
            <input type="text">
            <label>Password:</label>
            <input type="password">
            <a href="home.php">Login</a>
        </form>
    </body>
</html>
