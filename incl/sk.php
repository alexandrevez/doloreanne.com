<?php
const _SONGKICK_API_KEY = "7IvGwiiSJc1BjNbT";
const _SONGKICK_DOLO_ID = "8317503";
const _MAX_ARCHIVE = 16;

class Concert
{
	public $venueURL;
	public $venue;
	public $city;
	public $date;
	public $ticketsLink;

	public function __construct($venueURL="", $venue="", $city="", $date="", $ticketsLink="")
	{
		$this->venueURL = $venueURL;
		$this->venue = $venue;
		$this->city = $city;
		$this->date = $date;
		$this->ticketsLink = $ticketsLink;
	}
}

class SongKick
{
	private $_month = array(
		"alexembre", // :)
		"jan",
		"fév",
		"mar",
		"avr",
		"mai",
		"jun",
		"jul",
		"aoû",
		"sep",
		"oct",
		"nov",
		"déc"
	);

	public function next()
	{
		$url = "http://api.songkick.com/api/3.0/artists/"._SONGKICK_DOLO_ID."/calendar.json?apikey="._SONGKICK_API_KEY;
		if (function_exists('curl_init') && function_exists('curl_setopt'))
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_USERAGENT, 'doloreanne.com/1.0');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($ch);
			curl_close($ch);
		}
		else
		{
			$result = file_get_contents($url, null, stream_context_create(array(
				'http' => array(
					'protocol_version' => 1.1,
					'user_agent'       => 'doloreanne.com/1.0',
					'method'           => 'GET',
					'header'           => "Content-type: application/json\r\n".
										  "Connection: close\r\n",
				),
			)));
		}

		$concerts = json_decode($result);
		if ($result)
		{
			$formatted_concerts = array();

			foreach ($concerts->resultsPage->results->event as $event)
			{

				$concert = $this->_processConcert($event);
				$formatted_concerts[$concert->ts] = $concert;
			}

		}
		ksort($formatted_concerts);
		return $formatted_concerts;
	}

	private function _processConcert($event)
	{
		$concert = new Concert();
		$link = "#";
		if (sizeof($event->performance) > 1)
		{
			// We use the ticket lik as an artist. The artist is a link so it starts with http(s)
			$candidate = $event->performance[sizeof($event->performance)-1]->artist->displayName;
			if (substr($candidate, 0, 4) == "http")
			{
				$link = $candidate;
			}
		}
		$concert->ticketsLink = $link;

		$city = $event->location->city;
		$city_parts = explode(",", $city);
		if (sizeof($city_parts) >= 2)
		{
			$city = $city_parts[0].", ".$city_parts[1];
		}
		else
		{
			$city = "Inconnue";
		}
		$concert->city = $city;
		$concert->venue = $event->venue->displayName;
		$concert->venueURL = $event->venue->uri;

		if (property_exists($event, "end"))
		{
			$date = $event->end->date;
		}
		else
		{
			$date = $event->start->date;
		}
		$concert->ts = strtotime($date);
		$date_parts = explode("-", $date);
		if (sizeof($date_parts) >= 3)
		{
			if ((string)substr($date_parts[2], 0, 1) == "0")
			{
				$day = substr($date_parts[2], 1, 1);
			}
			else
			{
				$day = $date_parts[2];
			}
			if ($day == "1")
			{
				$day = "1<sup>er</sup>";
			}
			$month = $this->_month[intval($date_parts[1])];
			$date = "<div class='date-wrapper'>".$day." ".$month."</div>";
		}
		else
		{
			$date = "<div class='date-wrapper'>1<sup>er</sup> jan</div>";
		}
		$concert->date = $date;

		return $concert;
	}

	public static function buildConcertRow($concert, $isArchive=false)
	{
		$archive_class = "";
		if ($isArchive)
		{
			$archive_class = " archive";
		}

		$html = "<div class='row'>";
		$html .= "<div class='date ".$archive_class."'>".$concert->date."</div>";
		$html .= "<div class='venue ".$archive_class."'><a href='".$concert->venueURL."' target='_BLANK'>".$concert->venue."</a></div>";
		$html .= "<div class='city ".$archive_class."'>".$concert->city."</div>";

		if (!$isArchive)
		{
			if ($concert->ticketsLink == "#")
			{
				$html .= "<div class='tickets'>Billets à venir</div>";
			}
			else
			{
				$html .= "<div class='tickets'><a href='".$concert->ticketsLink."'  target='_BLANK'><button class='tickets-button'>Billets</button></a></div>";
			}
		}
		$html .= "</div>";
		return $html;
	}
}
