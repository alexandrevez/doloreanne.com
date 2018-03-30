var _ML_SUBSCRIBE_URL = "/incl/mc.php";

var _MUSIC_PLAYERS = {
	bombejusquaubout: {
		url: "https://bandcamp.com/EmbeddedPlayer/album=2784367923/size=large/bgcol=ffffff/linkcol=0687f5/transparent=true/",
		width: "350px",
		height: "488px"
	},
	danseencore: {
		url: "https://bandcamp.com/EmbeddedPlayer/album=1397447431/size=large/bgcol=ffffff/linkcol=0687f5/transparent=true/",
		width: "350px",
		height: "786px"
	},
	ep: {
		url: "https://bandcamp.com/EmbeddedPlayer/album=92791302/size=large/bgcol=ffffff/linkcol=63b2cc/transparent=true/",
		width: "350px",
		height: "588px"
	}
};

var _VIDEO_PLAYERS = {
	lascene: {
		url: "https://www.youtube.com/embed/zm-v0BfuC3M"
	},
	emilie: {
		url: "https://www.youtube.com/embed/reAvdd7yUWk"
	}
};

function bind()
{
	_bindNav();
	_bindMobileNav();
	_bindMenuMorpher();
	_bindMCSubscribe();
	_bindMusicNavigation();
	_bindVideoNavigation();

	var default_player = Object.keys(_MUSIC_PLAYERS)[0];
	_changeMusicPlayer(default_player, false);

	default_player = Object.keys(_VIDEO_PLAYERS)[0];
	_changeVideoPlayer(default_player);
}
function _bindNav()
{
	$("nav a.nav-elem").click(function(e)
	{
		var clicked_elem = $(e.target);
		var id_candidate = $(clicked_elem).attr("data-goto-id");
		if (id_candidate !== undefined)
		{
			_gotoSection(id_candidate);
		}

		id_candidate = $(clicked_elem).parent().attr("data-goto-id");
		if (id_candidate !== undefined)
		{
			_gotoSection(id_candidate);
		}

		id_candidate = $(clicked_elem).parent().parent().attr("data-goto-id");
		if (id_candidate !== undefined)
		{
			_gotoSection(id_candidate);
		}
		e.stopImmediatePropagation();
	});
}
var _old_menu_class = "";
function _bindMenuMorpher()
{
	$(".main-container").scroll(_updateMenuColor);
	_updateMenuColor();
}
function _updateMenuColor()
{
	var menu_offset = $(".menu-container").outerHeight(true);
	var result = "";
	if ($(".banner-container").offset().top !== 0 && $(".banner-container").offset().top - menu_offset <= 0)
	{
		result = "";
	}
	if ($(".section#musique").offset().top !== 0 && $(".section#musique").offset().top - menu_offset <= 0)
	{
		result = "musique";
	}
	if ($(".section#spectacles").offset().top !== 0 && $(".section#spectacles").offset().top - menu_offset <= 0)
	{
		result = "spectacles";
	}
	if ($(".section#videos").offset().top !== 0 && $(".section#videos").offset().top - menu_offset <= 0)
	{
		result = "videos";
	}
	if ($(".section#biographie").offset().top !== 0 && $(".section#biographie").offset().top - menu_offset <= 0)
	{
		result = "biographie";
	}
	if ($(".section#contact").offset().top !== 0 && $(".section#contact").offset().top - menu_offset <= 0)
	{
		result = "contact";
	}

	if (_old_menu_class !== result)
	{
		$(".menu-container").removeClass("musique");
		$(".menu-container").removeClass("spectacles");
		$(".menu-container").removeClass("videos");
		$(".menu-container").removeClass("biographie");
		$(".menu-container").removeClass("contact");
		$(".menu-container .wrapper nav div").removeClass("hover");

		$(".menu-container").addClass(result);
		if (result !== "")
		{
			$(".menu-container .wrapper nav div." + result).addClass("hover");
		}


		_old_menu_class = result;
	}
}
function _gotoSection(id)
{
	var offset = $("#" + id).offset();
	var offset_top = 0;

	if (offset !== undefined)
	{
		offset_top = offset.top - 60;
	}
	else
	{
		$('.main-container').animate({scrollTop: 0}, 150);
		return;
	}
	$('html, body').animate({scrollTop: offset_top}, 150);
}
function _bindMobileNav()
{
	$(".menu-container .wrapper nav div.hambiger").click(function(e){
		if (!$(".mobile-menu").hasClass("open"))
		{
			_openMobileMenu();
		}
		else
		{
			_closeMobileMenu();
		}
	});

	$(".mobile-menu a").click(_closeMobileMenu);
}
function _openMobileMenu()
{
	$("body").scrollTop(0);
	var color = $(".menu-container").css("background-color");

	$(".mobile-menu").addClass("open").css({"background-color": color});
	$(".main-container").removeClass("menu-open");
	$(".menu-container .wrapper nav div.hambiger").addClass("open");
}
function _closeMobileMenu()
{
	$(".mobile-menu").removeClass("open");
	$(".main-container").removeClass("menu-open");
	$(".menu-container .wrapper nav div.hambiger").removeClass("open");
}
function _bindVideoNavigation()
{
	$("ul.video-nav li").click(function(e)
	{
		var video_id = $(e.target).attr("data-video-id");
		if (video_id === undefined)
		{
			video_id = $(e.target).parent().attr("data-video-id");
		}

		_changeVideoPlayer(video_id, true);
	});

	$(".video-container iframe.player").on("load", function(e){
		_hideVideoLoading();
	});
}
function _changeVideoPlayer(videoID)
{
	var player_url = _VIDEO_PLAYERS[videoID].url;
	var current_player_url = $(".video-container iframe.player").attr("src");

	if (player_url != current_player_url)
	{
		_showVideoLoading();

		$(".video-container iframe.player").attr("src", player_url);
	}
}
function _showVideoLoading()
{
	$(".video-container iframe.player").css({opacity: 0});
	$(".video-container .loading").css({opacity: 1});
}
function _hideVideoLoading()
{
	$(".video-container iframe.player").css({opacity: 1});
	$(".video-container .loading").css({opacity: 0});
}
function _bindMusicNavigation()
{
	$("ul.album-nav li").click(function(e)
	{
		var album_id = $(e.target).attr("data-album-id");
		if (album_id === undefined)
		{
			album_id = $(e.target).parent().attr("data-album-id");
		}

		_changeMusicPlayer(album_id, true);

	});

	$(".player iframe.player").on("load", function(e){
		_hideMusicLoading();
	});
}
function _changeMusicPlayer(albumID, moveToSectionTop)
{
	var player_url = _MUSIC_PLAYERS[albumID].url;
	var current_player_url = $(".player iframe.player").attr("src");

	var player_width = _MUSIC_PLAYERS[albumID].width;
	var player_height = _MUSIC_PLAYERS[albumID].height;

	if (player_url != current_player_url)
	{
		$(".album-details-elem").css({opacity: 0});
		setTimeout(function()
		{
			$(".album-details-elem").css({display: "none"});
			$(".album-details-elem." + albumID).css({display: "block"});

			setTimeout(function()
			{
				$(".album-details-elem." + albumID).css({opacity: 1});
			},300);

		}, 600);

		if (moveToSectionTop)
		{
			_gotoSection("musique");
		}
		_showMusicLoading();

		$(".player iframe.player").attr("src", player_url);
		$(".player iframe.player").css("height", player_height);
		$(".player iframe.player").css("width", player_width);
	}
}
function _showMusicLoading()
{
	$(".player iframe.player").css({opacity: 0});
	$(".player .loading").css({opacity: 1});
}
function _hideMusicLoading()
{
	$(".player iframe.player").css({opacity: 1});
	$(".player .loading").css({opacity: 0});
}
function _bindMCSubscribe()
{
	_enable_mc_form();
	_reset_error();

	$("#ml-submit").click(function(e){
		_process_mc_form();
	});

	$("#ml-email").keydown(function(e){
		var code = (e.keyCode ? e.keyCode : e.which);
		if (code == 13)
		{
			_process_mc_form();
		}
	});
}
function _process_mc_form()
{
	if ($("#ml-submit").hasClass("disabled")) { return; }

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
	if ($("#ml-email").val() === "")
	{
		_show_mc_error("Veuillez saisir votre adresse courriel");
		return false;
	}
	if (!re.test($("#ml-email").val()))
	{
		_show_mc_error("Courriel invalide");
		return false;
	}

	return true;
}
function _reset_error()
{
	$(".mc-error-msg").html("Inscrivez-vous à notre infolettre");
	$(".mc-error-msg").removeClass("active");
	$("input.email").removeClass("error");
	$(".ml button").removeClass("error");
}
function _show_mc_error(msg)
{
	$(".mc-error-msg").html("*&nbsp;" + msg);
	$(".mc-error-msg").addClass("active");
	$("input.email").addClass("error");
	$(".ml button").addClass("error");
}
function _subscribe_to_mailchimp()
{
	var email = $("#ml-email").val();
	_disable_mc_form();

	$.post(_ML_SUBSCRIBE_URL, { email: email }, function(data) {
		_show_mc_success();
	});
}
function _disable_mc_form()
{
	$("#ml-submit").prop("disabled", true);
	$("#ml-email").prop("disabled", true);

	$("#ml-email").val("");
	$("#ml-email").attr("placeholder", "Chargement...");

	$("#ml-submit").addClass("disabled");
	$("#ml-email").addClass("disabled");
}
function _enable_mc_form(init)
{
	$("#ml-submit").prop("disabled", false);
	$("#ml-email").prop("disabled", false);

	$("#ml-email").val("");
	$("#ml-email").attr("placeholder", "Courriel");

	$("#ml-submit").removeClass("disabled");
	$("#ml-email").removeClass("disabled");
}
function _show_mc_success()
{
	_enable_mc_form();
	$(".mc-error-msg").html("Bien reçu! Veuillez vérifier votre boîte de courriel pour compléter le tout.");

	$("#ml-submit").addClass("registered");
	$("#ml-email").addClass("registered");
	$(".mc-error-msg").addClass("registered");
}
$(function() {
	bind();
});
