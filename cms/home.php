<html>
    <title>CMS Mobilize Web | Home</title>
    <head>

    </head>
    <body>
        <!-- Barra do topo -->
        <?php include "header.php"?>

        <!-- Corpo -->
        <!-- Cabeçalho da Listagem -->
        <div>
            <h3>Conteúdo</h3>
            <h4>Data de Postagem | Título | Opções</h4>
        </div>
        <!-- Listagem -->
        <div>
            <ul>
                <?php $a = 10 ?>
                <?php while ($a > 0) { ?>
                    <li>
                        06/06/06 12:34:56 | Noticia CABULOSA | <a href="www.pudim.com.br">Mostrar</a> | <a href="edit.php?type=content&item=1">Editar</a>
                    </li>
                    <?php $a--; ?>
                <?php } ?>
            </ul>
        </div>

        <h4><< Anterior | 1 2 3 4 5 6 | Próximo >></h4>

        <hr/>
        <!-- Cabeçalho da Listagem -->
        <div>
            <h3>Promoções</h3>
            <h4>Data de Postagem | Título | Opções</h4>
        </div>

        <!-- Listagem -->
        <div>
            <ul>
                <?php $a = 10 ?>
                <?php while ($a > 0) { ?>
                    <li>
                        06/06/06 12:34:56 | Promoção CABULOSA | <a href="www.pudim.com.br">Mostrar</a> | <a href="edit.php?type=promo&item=1">Editar</a>
                    </li>
                    <?php $a--; ?>
                <?php } ?>
            </ul>
        </div>    

        <div>
            <h4><< Anterior | 1 2 3 4 5 6 | Próximo >></h4>
        </div>
    </body>
</html>