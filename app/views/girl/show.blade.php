@extends('layouts.master')

@section('content')
<div class="grid_10 prefix_1 suffix_1">
	<h2>ハッピーバースデー！{{ $girl->name}}さん</h2>
	<div class="section">
		<h3>ハッピーバースデー！{{ $girl->name}}さん<br>{{ $year - $girl->year }}歳の誕生日、おめでとうございます。</h3>

		@for ($i = 0; $i < $girl->maxSize(); $i++)
			@if ($movie = $girl->movies($i))
				<p>@include('girl.fc2', array('movie' => $movie, 'w' => 740, 'h' => 448))</p>
				@include('girl.banner')
			@endif

			@if ($affiliate = $girl->affiliates($i))
				<p>@include('girl.mgstage', array('affiliate' => $affiliate))</p>
				@include('girl.banner')
			@endif
		@endfor
	</div>
</div>
@endsection