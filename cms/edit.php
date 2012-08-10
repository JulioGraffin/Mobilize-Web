<?php
if (isset($_GET["type"])) {
    $type = $_GET["type"];
}

if (isset($_GET["item"])) {
    $item = $_GET["item"];
}
?>

<html>
    <title>CMS Mobilize Web | Editar <?php
if ($type == "content") {
    print("Conteúdo");
} else {
    print("Promoção");
}
?></title>
    <head>

    </head>
    <body>
        <!-- Barra do topo -->
        <div>
            <ul>
                <li>Conteúdo</li>
                <li>Promoções</li>
                <li>Cusmotmização</li>
            </ul>
        </div>
        <!-- Informações do Login -->
        <div>
            <h3>Nome do moreno</h3>
            <a href="#">Logout</a>
        </div>

<?php if ($type == "content"): ?> 
            <form>
                <label>Título:</label>
                <input type="text">
                <label>Conteúdo:</label>
                <textarea></textarea>
                <label>Tags:</label>
                <input type="text">
                <label>Tipo de conteúdo:</label>
                <select>
                    <option>Selecione um tipo</option>
                    <option>Notícia</option>
                    <option>Moreno</option>
                </select>
                <label>Logo do Conteúdo:</label>
                <input type="file">
                <img src="http://www.pudim.com.br/SiteBuilder/UploadUsers/pudim.com.br/pudim.jpg">
                <a href="#">Atualizar</a>
            </form>
<?php else: ?>
            <form>
                <label>Título:</label>
                <input type="text">
                <label>Conteúdo:</label>
                <textarea><?php print("cu") ?></textarea>
                <label>Tags:</label>
                <input type="text">
                <label>Logo do Conteúdo:</label>
                <input type="file">
                Foto atual
                <img src="http://www.pudim.com.br/SiteBuilder/UploadUsers/pudim.com.br/pudim.jpg">
                <a href="#">Atualizar</a>
            </form>
<?php endif; ?>

    </body>
</html>
