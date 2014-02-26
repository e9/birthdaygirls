<?php

use Sunra\PhpSimple\HtmlDomParser;

class FC2Movie {
	public $url;
	public $tl;
	public $sj;

	public static function search_by_name($name)
	{
		return Cache::remember("fc2.{$name}", App::environment('production') ? 60*25 : 0, function()use($name)
		{
			$html = HtmlDomParser::file_get_html("http://video.fc2.com/a/movie_search.php?ordertype=2&perpage=3&keyword=".urlencode($name));

			$res = array_map(function($a){
				preg_match('/video([0-9]+)-thumbnail/', $a->find('img', 0)->src, $matches);
				return new FC2Movie($a->href, $a->title, $matches[1]);
			}, $html->find('.video_list_renew .video_thumb_small a'));

			$html->clear();

			return $res;
		});
	}

	public function __construct($url, $tl, $sj)
	{
		$this->url = $url;
		$this->tl  = $tl;
		$this->sj  = $sj;
	}
}