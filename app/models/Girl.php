<?php
class Girl extends Eloquent {
	protected $guarded = array('id');
	private $movies;
	private $affiliates;
	private $dmms;

	static public function comp($a, $b)
	{
		return $b->size() - $a->size();
	}

	public function prepare()
	{
		$this->movies();
		$this->affiliates();
		$this->dmms();
		return $this;
	}

	public function dmms($n = null)
	{
		if (is_null($this->dmms)) {
			$this->dmms = DMM::search_by_name($this->name);
		}
		return array_get($this->dmms, $n);
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

	public function maxSize()
	{
		return max(count($this->movies()), count($this->affiliates()));
	}

	public function size()
	{
		return (int) $this->movies() + count($this->affiliates());
	}
}