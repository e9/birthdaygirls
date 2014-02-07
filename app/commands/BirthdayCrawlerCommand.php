<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Sunra\PhpSimple\HtmlDomParser;

class BirthdayCrawlerCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:crawl:birthday';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Crawling girl's birthday in wikipedia.";

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
		$pages = array(
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%81%82%E8%A1%8C',
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%81%8B%E8%A1%8C',
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%81%95%E8%A1%8C',
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%81%9F%E8%A1%8C',
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%81%AA%E8%A1%8C',
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%81%AF%E8%A1%8C',
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%81%BE%E8%A1%8C',
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%82%84%E8%A1%8C',
			'/wiki/AV%E5%A5%B3%E5%84%AA%E4%B8%80%E8%A6%A7_%E3%82%89%E3%83%BB%E3%82%8F%E8%A1%8C',
		);

		foreach ( $pages as $page ) {
			$this->getGirlFromWikipedia($page);
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

	private function getGirlFromWikipedia($path)
	{
		$html = @HtmlDomParser::file_get_html("http://ja.wikipedia.org{$path}");
		if (!$html) return;
		foreach ( $html->find('h3') as $h3 ) {
			$ul = $h3->nextSibling();
			if ( $ul->tag == 'ul' ) foreach ( $ul->find('li[!id]') as $li ) {
				if ( ! $dom = $li->find('a[href^=/wiki/]', 0) ) continue;
				$name = html_entity_decode($dom->plaintext);
				$href = $dom->getAttribute('href');
				$this->info($name);
				$this->getBirthdayFromWikipedia($name, $href);
			}
		}
		$html->clear();
	}

	private function getBirthdayFromWikipedia($name, $path)
	{
		$html = @HtmlDomParser::file_get_html("http://ja.wikipedia.org{$path}");
		if (!$name || !$path || !$html) return;
		foreach ( $html->find('th') as $th ) {
			if ( !preg_match('/生年月日/', $th->plaintext) ) continue;
			$kana = $html->find('caption *', 0);
			$kana = $kana ? $kana->plaintext : "";
			$birthday = $th->nextSibling()->plaintext;
			if ( !preg_match('/([0-9]+)年([0-9]+)月([0-9]+)日/', $birthday, $matches) ) continue;

			$girl = Girl::firstOrNew(compact('name'));
			$girl->kana  = $kana;
			$girl->year  = (int) $matches[1];
			$girl->month = (int) $matches[2];
			$girl->day   = (int) $matches[3];
			$girl->save();
			$this->info($girl);
		}
		$html->clear();
	}

}
