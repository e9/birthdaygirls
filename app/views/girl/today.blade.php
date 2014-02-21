@extends('layouts.master')

@section('content')
<div class="grid_10 prefix_1 suffix_1">
	<h2>{{ $month }}月{{ $day }}日生まれの{{ count($girls) }}人のバースデーガールたち</h2>
	@foreach($girls as $girl)
		<div class="section">
			<h3><a href="/girl/{{ $girl->name }}">ハッピーバースデー！{{ $girl->name}}さん<br>{{ $year - $girl->year }}歳の誕生日、おめでとうございます。</a></h3>

			@if ($movie = array_get($girl->movies(), 0))
			<p>@include('girl.fc2', array('movie' => $movie, 'w' => 740, 'h' => 448))</p>
			@endif

			@if ($affiliate = array_get($girl->affiliates(), 0))
				<p>@include('girl.mgstage', array('affiliate' => $affiliate))</p>
			@endif

			<p class="see-more"><a href="/girl/{{ $girl->name }}">もっと見る</a></p>
		</div>
		@include('girl.banner')
	@endforeach
</div>
@endsection