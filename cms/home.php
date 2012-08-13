<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<title>CMS Mobilize Web | Home</title>
		<meta name="author" content="CMS Mobileze Web" />
		<meta name="description" content="CMS Mobileze Web - Sistema de Gerenciamento de Conteúdo" />
		<link href="../assets/css/default.css" type="text/css" rel="stylesheet">
		<link href="../assets/css/fancydropdown.css" type="text/css" rel="stylesheet">

		<script type="text/javascript" src="../assets/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="../assets/js/fancydropdown.js"></script>
	</head>
	<body>
		<!-- bar header -->
		<?php include "header.php"?>
		
		<div id="container">
			<div id="content">
				<!-- content list -->
				<div>
					<h3>Conteúdo</h3>
					<h4>Data de Postagem | Título | Opções</h4>
				</div>
				<div>
					<ul>
						<?php $a = 10
						?>
						<?php while ($a > 0) {
						?>
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
						<?php $a = 10
						?>
						<?php while ($a > 0) {
						?>
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
			</div>
		</div>

	</body>
</html>