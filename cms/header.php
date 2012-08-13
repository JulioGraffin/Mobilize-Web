<?php
    session_start();
?>
<div>
    <ul>
        <li>
            <a href="content.php">Conteúdo</a>
        </li>
        <li>
            <a href="promo.php">Promoções</a>
        </li>
        <li>
            <a href="#">Cusmotmização</a>
        </li>
    </ul>
</div>
<!-- Informações do Login -->
<div>
    <h3><?php print($_SESSION['name'])?></h3>
    <a href="../php/post.php?fun=logout">Logout</a>
</div>