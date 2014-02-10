<?php

class GirlController extends \BaseController {

	public function show($girl)
	{
		return View::make('girl.show', compact('girl'));
	}

}