<?php
class Girl extends Eloquent {
	protected $guarded = array('id');
	private $movies;
	private $affiliates;
	private $dmmMovies;
	private $dmmAffiliates;

	static public function comp($a, $b)
	{
		return $b->size() - $a->size();
	}

	public function prepare()
	{
		$this->movies();
		$this->affiliates();
		$this->dmmAffiliates();
		$this->dmmMovies();
		return $this;
	}

	public function dmmMovies($n = null)
	{
		if (is_null($this->dmmMovies)) {
			$this->dmmMovies = DMM_Movie::search_by_name($this->name);
		}
		return array_get($this->dmmMovies, $n);
	}

	public function dmmAffiliates($n = null)
	{
		if (is_null($this->dmmAffiliates)) {
			$this->dmmAffiliates = DMM_Affiliate::search_by_name($this->name);
		}
		return array_get($this->dmmAffiliates, $n);
	}

	public function movies($n = null)
	{
		if (is_null($this->movies)) {
			$this->movies = FC2Movie::search_by_name($this->name);
		}
		return array_get($this->movies, $n);
	}

	public function affiliates($n = null)
	{
		if (is_null($this->affiliates)) {
			$this->affiliates = MGStage::search_by_name($this->name);
		}
		return array_get($this->affiliates, $n);
	}

	public function dmmMaxSize()
	{
		return max(count($this->dmmMovies()), count($this->dmmAffiliates()));
	}

	public function maxSize()
	{
		return max(count($this->movies()), count($this->affiliates()));
	}

	public function size()
	{
		return (int) count($this->movies()) + count($this->affiliates()) + $this->year;
	}
}