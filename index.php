<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:type" content="website">
	<meta property="og:url" content="http://www.doloreanne.com/">
	<meta property="og:title" content="Doloréanne">
	<meta property="og:description" content="Nouvel album : Danse encore">
	<meta property="og:site_name" content="Doloréanne - Danse encore">
	<meta property="og:image" content="http://doloreanne.com/img/fb-cover.png">
	<meta itemscope="" itemtype="website">
	<meta itemprop="description" content="Nouvel album : Danse encore">
	<meta itemprop="image" content="http://doloreanne.com/img/fb-cover.png">
	<link rel="icon" type="image/png" href="img/icon.png" />

	<title>Doloréanne - Danse encore</title>
	<link href="./css/screen.css" media="screen" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/main.js"></script>
	<script type="text/javascript">
	<?php
	if ($_SERVER[HTTP_HOST] != "dolo.dev.co")
	{
	?>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-40961331-2', 'doloreanne.com');
	ga('require', 'linkid', 'linkid.js');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');
	<?php
	}
	?>
	</script>
</head>
<body>
	<?php require_once("1-head.php"); ?>

	<div class="main-container">
		<div class="banner-container">
			<video width="100%" height="auto" autoplay loop>
				<source src="/vid/emilie-banner-noaudio.mp4" type="video/mp4">
			</video>
			<div class="banner-overlay">&nbsp;</div>
			<div class="banner-logo">
				<img alt="Doloréanne Danse Encore" src="/img/logo.svg" />
			</div>
		</div>

		<?php require_once("2-musique.php"); ?>
		<?php require_once("3-spectacles.php"); ?>
		<?php require_once("4-videos.php"); ?>
		<?php require_once("5-bio.php"); ?>
		<?php require_once("6-contact.php"); ?>
		<footer>
			<div class="ml">
				<div class="wrapper">
					<h3>Infolettre</h3>
					<div class="form">
						<input id="ml-email" class="email" type="text" placeholder="Courriel" />
						<button id="ml-submit">S'inscrire</button>
						<div style="clear:both;height:0;width:0">&nbsp;</div>
						<div class="mc-error-msg">*&nbsp;Veuillez inscrire votre courriel</div>
					</div>
				</div>
			</div>

			<div class="follow">
				<div class="wrapper">
					<h3>Suivez-nous</h3>
					<div class="button-container">
						<div class="button first">
							<a href="http://facebook.com/doloreanne" target="BLANK">
								<img id="facebook-button" src="./img/facebook.png" />
							</a>
						</div>
						<div class="button">
							<a href="https://www.youtube.com/user/groupedoloreanne/videos" target="BLANK">
								<img style="padding-left: 9px;" id="youtube-button" src="./img/youtube.png" />
							</a>
						</div>
						<div class="button">
							<a href="http://doloreanne.bandcamp.com" target="BLANK">
								<img style="padding-left: 3px;" id="bandcamp-button" src="./img/bandcamp.png" />
							</a>
						</div>
						<div class="button">
							<a href="http://twitter.com/doloreanne" target="BLANK">
								<img style="padding-left: 9px;" id="twitter-button" src="./img/twitter.png" />
							</a>
						</div>
						<div class="button">
							<a href="https://plus.google.com/+DoloreanneMusique/" target="BLANK">
								<img style="padding-left: 9px;" id="gplus-button" src="./img/gplus.png" />
							</a>
						</div>
						<div style="height:0;width:0;clear:both;">&nbsp;</div>
					</div>
				</div>
			</div>

			<div style="clear:both;height:0;width:0;">&nbsp;</div>
		</footer>
	</div>
</body>
</html>
