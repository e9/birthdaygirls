<?php

class GirlController extends \BaseController {

	public function show($girl)
	{
		$now   = time();
		$year  = date('Y', $now);
		$month = date('n', $now);
		$day   = date('j', $now);

		return View::make('girl.show', compact('girl', 'year', 'month', 'day'));
	}

}