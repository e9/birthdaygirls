@extends('layouts.master')

@section('content')
<div class="row">
<h2 class="bg-lightPink fg-white">
{{ $month }}月{{ $day }}日生まれの@if (count($girls) == 1)バースデーガール@else{{ count($girls) }}人のバースデーガールたち@endif
</h2>
</div>

<div class="row">
	@foreach($girls as $girl)
		<div class="section bg-lightPink">
			<h3 class="bg-white"><a href="/dmm/girl/{{ $girl->name }}">ハッピーバースデー！{{ $girl->name}}さん<br>{{ $year - $girl->year }}歳の誕生日、おめでとうございます。</a></h3>

			@if ($movie = $girl->dmmMovies(0))
			@include('dmm.movie', array('movie' => $movie))
			@endif

			@if ($affiliate = $girl->dmmAffiliates(0))
			@include('dmm.affiliate', array('affiliate' => $affiliate))
			@endif

			<div class="content girllink">
			<a href="/dmm/girl/{{ $girl->name }}" class="bg-white place-right girllink">もっと見る</a>
			</div>
		</div>
		@include('girl.banner')
	@endforeach
</div>
@endsection