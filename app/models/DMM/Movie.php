<?php

use Sunra\PhpSimple\HtmlDomParser;

class DMM_Movie {
	public $cid;

	public static function search_by_name($name)
	{
		// return Cache::remember("dmm.movie.{$name}", App::environment('production') ? 60*25 : 0, function()use($name)
		// {
			// http://www.dmm.co.jp/search/?category=sample_litevideo&searchstr=sakuramana&analyze=V1EBDVYFUwE_&redirect=1&sort=&limit=30&view=package&enc=UTF-8&commit=%E6%A4%9C%E7%B4%A2

			$url  = "http://www.dmm.co.jp/search?";
			$url .= http_build_query(array(
				'category'  => 'sample_litevideo',
				'searchstr' => $name,
				'redirect'  => 1,
				'limit'     => 10,
				'view'      => 'package',
				'enc'       => 'UTF-8',
				'commit'    => '%E6%A4%9C%E7%B4%A2',
			));

			$default_stream_context = stream_context_get_options(stream_context_get_default());
			stream_context_set_default(
			    array(
			        'http' => array(
			            'follow_location' => false
			        )
			    )
			);
			$http_header = get_headers($url, 1);
			stream_context_set_default($default_stream_context);

			$context = stream_context_create(array( 
				'http'=>array( 
					'method' => 'GET',
					'header' => array("Referer: http://www.dmm.co.jp/\r\n"."Cookie: ckcy=1\r\n") 
				) 
			)); 

			$url = 'http://www.dmm.co.jp'.$http_header['Location'];
			Log::info($url);
			$html = HtmlDomParser::file_get_html($url, false, $context);

			$res = array_map(function($li){
				preg_match('/\/cid=(.+)\/$/', $li->find('a', 0)->href, $matches);
				return new DMM_Movie($matches[1]);
			}, array_slice($html->find('ul#list li'), 0, 8));

			$html->clear();

			return $res;
		// });
	}

	public function __construct($cid)
	{
		$this->cid = (string) $cid;
	}
}
