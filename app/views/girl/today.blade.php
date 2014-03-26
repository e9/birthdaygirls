@extends('layouts.master')

@section('content')
<div class="row">
<h2 class="bg-lightPink fg-white">
{{{ $month }}}月{{{ $day }}}日生まれの@if (count($girls) == 1)バースデーガール@else{{{ count($girls) }}}人のバースデーガールたち@endif
</h2>
</div>

<div class="row">
	@foreach($girls as $girl)
		<div class="section bg-lightPink">
			<h3 class="bg-white"><a href="/girl/{{{ $girl->name }}}" class="darklink">ハッピーバースデー！{{{ $girl->name}}}さん<br>{{{ $year - $girl->year }}}歳の誕生日、おめでとうございます。</a></h3>

			@if ($movie = array_get($girl->movies(), 0))
			@include('girl.fc2', array('movie' => $movie, 'w' => 740, 'h' => 448))
			@endif

			@if ($affiliate = array_get($girl->affiliates(), 0))
			@include('girl.mgstage', array('affiliate' => $affiliate))
			@endif

			<div class="content girllink">
			<a href="/girl/{{{ $girl->name }}}" class="bg-white place-right girllink darklink">もっと見る</a>
			</div>
		</div>
		@include('girl.banner')
	@endforeach
</div>
@endsection