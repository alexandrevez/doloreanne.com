<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:type" content="website">
	<meta property="og:url" content="http://www.doloreanne.com/media">
	<meta property="og:title" content="Doloréanne trousse media">
	<meta property="og:description" content="Nouvel album : Danse encore">
	<meta property="og:site_name" content="Doloréanne - Trousse média">
	<meta property="og:image" content="http://doloreanne.com/img/fb-cover.png">
	<meta itemscope="" itemtype="website">
	<meta itemprop="description" content="Nouvel album : Danse encore">
	<meta itemprop="image" content="http://doloreanne.com/img/fb-cover.png">
	<link rel="icon" type="image/png" href="../img/icon.png" />

	<title>Doloréanne - Trousse média</title>
	<link href="./media/css/screen.css" media="screen" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./media/js/main.js"></script>
	<script type="text/javascript">
	<?php
	if ($_SERVER[HTTP_HOST] != "dolo.dev.co")
	{
	?>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-40961331-2', 'doloreanne.com/mediapack');
	ga('require', 'linkid', 'linkid.js');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');
	<?php
	}
	?>
	</script>
</head>
<body>
	<div class="main-container">
		<div class="banner-container">
			<video width="100%" height="auto" autoplay loop>
				<source src="../vid/emilie-banner-noaudio.mp4" type="video/mp4">
			</video>
			<div class="banner-overlay">&nbsp;</div>
			<div class="banner-logo">
				<img alt="Doloréanne Danse Encore" src="/img/logo.svg" />
			</div>
		</div>

		<?php require_once("2-musique.php"); ?>
		<?php require_once("3-presse.php"); ?>
		<?php require_once("3.1-faits-notoires.php"); ?>
		<?php require_once("4-videos.php"); ?>
		<?php require_once("5-photos.php"); ?>
		<?php require_once("6-contact.php"); ?>
	</div>
</body>
</html>
