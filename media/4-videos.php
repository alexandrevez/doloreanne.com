<div class="section" id="videos">

	<h2>Vidéos</h2>

	<div class="video-container">

		<div class="loading">
			<img src="./img/loading-white.svg" />
			<div>Chargement...</div>
		</div>

		<?php if (isset($_SERVER['HTTP_USER_AGENT']) && !preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) { ?>

		<iframe class="player" style="border: 0;" src="" seamless></iframe>

		<?php } ?>

	</div>

	<h3 class="sub">Tous les vidéos</h3>
	<div class="video-nav-wrapper">
		<ul class="video-nav">
			<li id="aperosfeq" data-video-id="aperosfeq">
				<img class="cover" src="./img/aperosfeq_thumb.jpg" />
				<div class="overlay-text" data-album-id="danseencore">
					<img class="play" src="./img/play-button.svg"></img>
					<div class="title" style="color:#3a8881;">Extraits Apéros FEQ (2017-04-05)</div>
				</div>
			</li>
			<li id="aperosfeq" data-video-id="lascene">
				<img class="cover" src="./img/lascene_thumb.jpg" />
				<div class="overlay-text" data-album-id="danseencore">
					<img class="play" src="./img/play-button-white.svg"></img>
					<div class="title">La scène (Vidéoclip)</div>
				</div>
			</li>
			<li id="emilie" data-video-id="emilie" style="margin-top:50px;">
				<img class="cover" src="./img/emilie_thumb.jpg" />
				<div class="overlay-text" data-album-id="danseencore">
					<img class="play" src="./img/play-button-white.svg"></img>
					<div class="title">Émilie (Vidéoclip)</div>
				</div>
			</li>
		</ul>
	</div>
</div>
