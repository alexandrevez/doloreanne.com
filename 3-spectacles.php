<?php
require_once("./incl/sk.php");
$sk = new SongKick();
$next_concerts = $sk->next();
$concert_empty = sizeof($next_concerts) <= 0;

$concert_empty_class = "";
if ($concert_empty)
{
	// watch the space before the class value
	$concert_empty_class = " empty";
}
?>
<div class="section<?php echo $concert_empty_class; ?>" id="spectacles">

	<h2>Spectacles</h2>


	<div class="concerts-container">
		<div class="wrapper">
			<?php
			if ($concert_empty)
			{
				echo "<div class='no-concerts'><h3>Il n'y a aucun concert de prévu pour l'instant. D'autres dates s'afficheront bientôt.</h3></div>";
			}
			else
			{
				foreach ($next_concerts as $concert)
				{
					echo SongKick::buildConcertRow($concert);
				}
			}
			?>
		</div>
	</div>

</div>
