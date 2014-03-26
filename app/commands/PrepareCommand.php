<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PrepareCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:prepare';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Prepare girls of tomorrow.';

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
		$now   = strtotime('tomorrow');
		$year  = date('Y', $now);
		$month = date('n', $now);
		$day   = date('j', $now);

		$this->info("{$year}/{$month}/{$day}");

		$girls = Girl::where('month', $month)->where('day', $day)->get()->all();
		foreach ($girls as $girl) {
			$this->info($girl->name);
			$girl->prepare();
			sleep(60);
		}
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
