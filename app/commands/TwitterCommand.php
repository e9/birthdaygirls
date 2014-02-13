<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TwitterCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:twitter';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Twitter.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$max = 10;

		$now   = time();
		$year  = date('Y', $now);
		$month = date('n', $now);
		$day   = date('j', $now);

		$girls = Girl::where('month', $month)->where('day', $day)->get()->toArray();

		shuffle($girls); // TODO

		$count = count($girls);

		$girls = array_slice($girls, 0, $max);

		$str = implode(array_map(function($name){return "{$name}さん、";}, array_pluck($girls, 'name')));

		if ($count > $max) $str.="ほか".($count - $max)."名の皆様、";
		
		$str .= "お誕生日おめでとうございます。";
		Twitter::postTweet(array('status' => $str, 'format' => 'json'));
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
