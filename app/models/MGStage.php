<?php

use Sunra\PhpSimple\HtmlDomParser;

class MGStage {
	public $url;
	public $img;

	public static function search_by_name($name)
	{
		return Cache::remember("mgs.{$name}", App::environment('production') ? 60*25 : 0, function()use($name)
		{
			$context = stream_context_create(array( 
				'http' => array( 
					'method' => 'GET',
					'header' =>
						"Referer: http://www.mgstage.com/\r\n".
						"Cookie: adc=1\r\n"
				) 
			)); 

			$url = "http://www.mgstage.com/ppv/list/cast/".rawurlencode($name)."/1/table/rank/all/?_=".time();
			Log::info($url);
			$html = HtmlDomParser::file_get_html($url, false, $context);
			Log::info($html);

			if (!$html->find('.pager') || !$html->find('.title_search_result', 0)) return array();

			$elems = $html->find('.title_search_result', 0)->nextSibling('ul')->find('.item_layout_02_price');
			$res = array_map(function($elem){
				$url = $elem->find('a', 0)->href;
				$img = $elem->find('img', 0)->src;
				return new MGStage($url, $img);
			}, $elems);

			$html->clear();

			return $res;
		});
	}

	public function __construct($url, $img)
	{
		$sliced = array_filter(explode('/', $url), 'strlen');
		$pn = array_pop($sliced);
		$af = "~AFOO6Y8WB3XILYDHJTPJ3R86TOBH";

		$this->url = "http://www.mgstage.com/{$af}/ppv/video/{$pn}";
		$this->img = str_replace('pf_t1', 'pb_e', $img);
	}
}