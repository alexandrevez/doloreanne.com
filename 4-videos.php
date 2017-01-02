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

</div>
