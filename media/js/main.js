var _ML_SUBSCRIBE_URL = "/incl/mc.php";

var _MUSIC_PLAYERS = {
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
	emilie: {
		url: "https://www.youtube.com/embed/reAvdd7yUWk"
	}
};

function bind()
{
	_bindMusicNavigation();
	_bindVideoNavigation();

	var default_player = Object.keys(_MUSIC_PLAYERS)[0];
	_changeMusicPlayer(default_player, false);

	default_player = Object.keys(_VIDEO_PLAYERS)[0];
	_changeVideoPlayer(default_player);
}
function _bindVideoNavigation()
{
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
$(function() {
	bind();
});
