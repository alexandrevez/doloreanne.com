<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=0.7">
<title><?php if (is_front_page()){ bloginfo("name"); } else { single_post_title(""); }?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="http://f0.bcbits.com/img/a0271511303_3.jpg" rel="shortcut icon">
<link href="http://f0.bcbits.com/img/a0271511303_3.jpg" rel="apple-touch-icon">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php
global $option_setting;
?>

<div id="page" class="hfeed site <?php echo $author_class; ?>">
<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<div class="site-branding col-lg-4 col-md-12">

			<div class="left-column">
				<h2 class="site-title">
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						Blogue
					</a>
				</h2>
			</div>

			<div class="right-column">
				<h2 class="site-title" style="display: inline-block;">
					<a href="<?php echo esc_url($_SERVER['SERVER_NAME']); ?>" rel="home">
						Retour au site
						<img src="/../img//wezo.svg" style="padding-top: 15px; width: 41px; height: auto;"/>
					</a>
				</h2>
			</div>

		</div>

	</div><!--.container-->

	<script type="text/javascript">
	var _ML_SUBSCRIBE_URL = "../mc.php";
	function bind()
	{
		_bindMCSubscribe();
		_bindBackground();
		_bindMobile();
	}
	function _bindMobile()
	{
		if( navigator.userAgent.match(/Android/i)
			|| navigator.userAgent.match(/webOS/i)
			|| navigator.userAgent.match(/iPhone/i)
			|| navigator.userAgent.match(/iPad/i)
			|| navigator.userAgent.match(/iPod/i)
			|| navigator.userAgent.match(/BlackBerry/i)
			|| navigator.userAgent.match(/Windows Phone/i))
		{
			 jQuery("body").addClass("mobile");
		}
	}
	function _bindBackground()
	{
		if (jQuery("#primary-mono").length > 0)
		{
			jQuery("body").addClass("bg-hidden");
		}
	}
	function _bindMCSubscribe()
	{
		_enable_mc_form();
		_reset_error();

		jQuery("#ml-submit").click(function(e){
			_process_mc_form();
		});

		jQuery("#ml-email").keydown(function(e){
			var code = (e.keyCode ? e.keyCode : e.which);
			if (code == 13)
			{
				_process_mc_form();
			}
		});
	}
	function _process_mc_form()
	{
		if (jQuery("#ml-submit").hasClass("disabled")) { return; }

		var _email_valid = _validate_mc_email();
		if (_email_valid)
		{
			_subscribe_to_mailchimp();
		}
	}
	function _validate_mc_email()
	{
		_reset_error();

		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (jQuery("#ml-email").val() == "")
		{
			_show_mc_error("Veuillez saisir votre adresse courriel");
			return false;
		}
		if (!re.test(jQuery("#ml-email").val()))
		{
			_show_mc_error("Courriel invalide");
			return false;
		}

		return true;
	}
	function _reset_error()
	{
		jQuery(".mc-error-msg").html("<i>Inscrivez-vous pour rester informé.</i><div style='font-size:12px;'>Chansons, spectacles, concours, etc.</div>");
		jQuery(".mc-error-msg").removeClass("active");
		jQuery("input.email").removeClass("error");
		jQuery(".ml button").removeClass("error");
	}
	function _show_mc_error(msg)
	{
		jQuery(".mc-error-msg").html("*&nbsp;" + msg);
		jQuery(".mc-error-msg").addClass("active");
		jQuery("input.email").addClass("error");
		jQuery(".ml button").addClass("error");
	}
	function _subscribe_to_mailchimp()
	{
		var email = jQuery("#ml-email").val();
		_disable_mc_form();

		jQuery.post(_ML_SUBSCRIBE_URL, { email: email }, function(data) {
			_show_mc_success();
		});
	}
	function _disable_mc_form()
	{
		jQuery("#ml-submit").prop("disabled", true);
		jQuery("#ml-email").prop("disabled", true);

		jQuery("#ml-email").val("");
		jQuery("#ml-email").attr("placeholder", "Chargement...");

		jQuery("#ml-submit").addClass("disabled");
		jQuery("#ml-email").addClass("disabled");
	}
	function _enable_mc_form(init)
	{
		jQuery("#ml-submit").prop("disabled", false);
		jQuery("#ml-email").prop("disabled", false);

		jQuery("#ml-email").val("");
		jQuery("#ml-email").attr("placeholder", "Courriel");

		jQuery("#ml-submit").removeClass("disabled");
		jQuery("#ml-email").removeClass("disabled");
	}
	function _show_mc_success()
	{
		_enable_mc_form();
		jQuery(".mc-error-msg").html("Bien reçu! Veuillez vérifier votre boîte de courriel pour compléter le tout.");

		jQuery("#ml-submit").addClass("registered");
		jQuery("#ml-email").addClass("registered");
		jQuery(".mc-error-msg").addClass("registered");
	}
	jQuery(function() {
		bind();
	});

	</script>

</header><!-- #masthead -->

	<?php get_template_part('parallax'); ?>
	<?php get_template_part('slider') ?>
	<?php get_template_part('showcase') ?>

	<div id="content" class="site-content container">
