<?php

class BirthdayController extends \BaseController {

	protected $layout = 'layouts.master';

	public function today()
	{
		$now   = time();
		$month = date('n', $now);
		$day   = date('j', $now);

		$girls = Girl::where('month', $month)->where('day', $day)->get();

		$this->layout->content = View::make('birthday.today', compact('month', 'day', 'girls'));
	}

}