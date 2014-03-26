@extends('layouts.master')

@section('content')
<div class="row">
<h2 class="bg-lightPink fg-white" style="position: relative;">
ハッピーバースデー！{{{ $girl->name}}}さん
<div class="place-right">@include('girl.social', array('oneline' => true))</div>
</h2>
</div>

<div class="row">
	<div class="section bg-lightPink">
		<h3 class="bg-white">ハッピーバースデー！{{{ $girl->name}}}さん<br>{{{ $year - $girl->year }}}歳の誕生日、おめでとうございます。</h3>

		@for ($i = 0; $i < $girl->maxSize(); $i++)
			@if ($movie = $girl->movies($i))
			@include('girl.fc2', array('movie' => $movie, 'w' => 740, 'h' => 448))
			@include('girl.banner')
			@endif

			@if ($affiliate = $girl->affiliates($i))
			@include('girl.mgstage', array('affiliate' => $affiliate))
			@include('girl.banner')
			@endif
		@endfor
	</div>
</div>
@endsection