<?php

class DMM {
	public $url;
	public $img;

	public static function search_by_name($name)
	{
		return Cache::remember("dmm.affiliate.{$name}", App::environment('production') ? 60*25 : 0, function()use($name)
		{
		$url  = "http://affiliate-api.dmm.com/?";
		$url .= http_build_query(array(
			'api_id'       => 'rGhhR1XQdPx1d9mmLN1n',
			'affiliate_id' => 'birthdaygirl-999',
			'operation'    => 'ItemList',
			'version'      => '2.00',
			'timestamp'    => date('Y-m-d H:i:s'),
			'site'         => 'DMM.co.jp',
			'service'      => 'digital',
			'floor'        => 'videoa',
			'hits'         => 10,
			'keyword'      => mb_convert_encoding($name, "eucjp-win", "utf-8"),
		));

		$euc_str = file_get_contents($url);
		$xml = simplexml_load_string($euc_str);

		$res = array();

		if ($xml->result->result_count) {
			foreach ($xml->result->items->item as $item) {
				$res[] = new DMM($item->affiliateURL, $item->imageURL->large);
			}
		}

		return $res;
		});
	}


	public function __construct($url, $img)
	{
		$this->url = (string) $url;
		$this->img = (string) $img;
	}
}
