<?php
    session_start();
?>
<div id="bar">
	<h1>
		<a href="index.php">
			<img src="../assets/images/logo/logo_radiocontrolesms.png" alt="" title="">
		</a>
	</h1>
	<div id="nav">
		<ul class="tabs">
			<li class="hasmore"><a id="btn_content" href="#"><span>Conteúdo</span></a>
				<ul class="dropdown">
					<li><a href="#">Menu item 1</a></li>
					<li><a href="#">Menu item 2</a></li>
					<li><a href="#">Menu item 3</a></li>
					<li class="last"><a href="#">Menu item 6</a></li>
				</ul>
			</li>
			<li class="hasmore"><a id="btn_promotions" href="#"><span>Promoções</span></a>
				<ul class="dropdown">
					<li><a href="#">Topic 1</a></li>
					<li><a href="#">Topic 2</a></li>
					<li><a href="#">Topic 3</a></li>
					<li class="last"><a href="#">Topic 4</a></li>
				</ul>
			</li>
			<li class="hasmore"><a id="btn_custom" href="/about/#networks"><span>Customização</span></a>
				<ul class="dropdown">
					<li><a href="#">Twitter</a></li>
					<li><a href="#">posterous</a></li>
					<li><a href="#">SpeakerSite</a></li>
					<li><a href="#">LinkedIn</a></li>
					<li class="last"><a href="#">See more&hellip;</a></li>
				</ul>
			</li>
		</ul>
	</div>
	
	<!-- Login information -->
	<h2>
		<strong><?php print($_SESSION['name'])?></strong>
		<a href="../php/post.php?fun=logout">Sair</a>
	</h2>
</div>
