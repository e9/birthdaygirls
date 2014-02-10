<?php

class BirthdayController extends \BaseController {

	public function today()
	{
		$now   = time();
		$year  = date('Y', $now);
		$month = date('n', $now);
		$day   = date('j', $now);

		$girls = Girl::where('month', $month)->where('day', $day)->get();

		return View::make('girl.today', compact('year', 'month', 'day', 'girls'));
	}

}