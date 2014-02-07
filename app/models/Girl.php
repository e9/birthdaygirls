<?php
class Girl extends Eloquent {
	protected $guarded = array('id');
	private $movies;

	public function movies()
	{
		$this->movies = $this->movies ?: FC2Movie::search_by_name($this->name);
		return $this->movies;
	}
}