<?php

class DmmController extends \BaseController {

	public function today()
	{
		$now   = time();
		$year  = date('Y', $now);
		$month = date('n', $now);
		$day   = date('j', $now);

		$girls = Girl::where('month', $month)->where('day', $day)->get()->all();

		$girls = array_filter($girls, function($girl){return $girl->size();});

		usort($girls, array('Girl', 'comp'));
		
		$description = implode(array_map(function($name){return "{$name}さん、";}, array_pluck($girls, 'name'))) . "お誕生日おめでとうございます。";
		View::share('description', $description);
		View::share('subtitle', "今日が誕生日のAV女優を毎日、紹介");
		View::share('root', "/dmm");

		return View::make('dmm.today', compact('year', 'month', 'day', 'girls'));
	}
	
	public function show($girl)
	{
		$now   = time();
		$year  = date('Y', $now);
		$month = date('n', $now);
		$day   = date('j', $now);

		$description = "{$girl->name}さん、お誕生日おめでとうございます。";
		View::share('description', $description);
		View::share('subtitle', $description);
		View::share('root', "/dmm");

		return View::make('dmm.show', compact('girl', 'year', 'month', 'day'));
	}
}