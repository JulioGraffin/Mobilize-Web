<?php
if (isset($_GET["type"])) {
    $type = $_GET["type"];
}
?>

<html>
    <head>
        <title>CMS Mobilize Web | Nov<?php
if ($type == "conteudo") {
    print("o Conteúdo");
} else {
    print("a Promoção");
}
?></title>
    </head>
    <body>
        <!-- Barra do topo -->
        <?php include "header.php"?>

        <?php if ($type == "conteudo"): ?> 
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
                <input type="button" value="Postar conteúdo">
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
                <input type="button" value="Criar">
            </form>
        <?php endif; ?>

    </body>
</html>
