@extends('layouts.master')

@section('content')
<div class="grid_10 prefix_1 suffix_1">
	<h2>ハッピーバースデー！{{ $girl->name}}さん</h2>
	<div class="section">
		<h3>ハッピーバースデー！{{ $girl->name}}さん<br>{{ $year - $girl->year }}歳の誕生日、おめでとうございます。</h3>
		@foreach ($girl->movies() as $i => $movie)
			<p>@include('girl.fc2', array('movie' => $movie, 'w' => 740, 'h' => 448))</p>
			@include('girl.banner')
			<p><img data-src="holder.js/740x448"></p>
			@include('girl.banner')
		@endforeach
	</div>
</div>
@endsection