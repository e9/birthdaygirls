<?php

class GirlController extends \BaseController {

	public function today()
	{
		$now   = time();
		$year  = date('Y', $now);
		$month = date('n', $now);
		$day   = date('j', $now);

		$girls = Girl::where('month', $month)->where('day', $day)->get()->all();

		$girls = array_filter($girls, function($girl){return $girl->size();});

		usort($girls, array('Girl', 'comp'));
		
		return View::make('girl.today', compact('year', 'month', 'day', 'girls'));
	}
	
	public function show($girl)
	{
		$now   = time();
		$year  = date('Y', $now);
		$month = date('n', $now);
		$day   = date('j', $now);

		return View::make('girl.show', compact('girl', 'year', 'month', 'day'));
	}

}