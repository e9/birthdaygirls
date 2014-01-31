<?php

class GirlController extends \BaseController {

	protected $layout = 'layouts.master';

	public function show($girl)
	{
		$this->layout->content = View::make('girl.show', compact('girl'));
	}

}