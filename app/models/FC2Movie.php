<?php

use Sunra\PhpSimple\HtmlDomParser;

class FC2Movie {
	public $title;
	public $url;

	public static function search_by_name($name)
	{
		$minutes = 60 * 12;

		return Cache::remember("fc2.{$name}", $minutes, function()
		{
			$html = @HtmlDomParser::file_get_html("http://video.fc2.com/a/movie_search.php?ordertype=2&perpage=10&keyword=".urlencode($name));
			if (!$html) return array();
			return array_map(function($a){return new static('', $a->href);}, $html->find('.video_list_renew .video_info_right h3 a'));
		});
	}

	public function __construct($title, $url)
	{
		$this->title = $title;
		$this->url   = $url;
	}
}