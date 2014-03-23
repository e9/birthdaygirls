@extends('layouts.master')

@section('content')
<div class="row">
<h2 class="offset1 span10 bg-lightPink fg-white">
{{ $month }}月{{ $day }}日生まれの@if (count($girls) == 1)バースデーガール@else{{ count($girls) }}人のバースデーガールたち@endif
</h2>
</div>

<div class="row">
<div class="offset1 span10 bg-lightPink">
	@foreach($girls as $girl)
		<div class="section">
			<h3 class="bg-white"><a href="/dmm/girl/{{ $girl->name }}">ハッピーバースデー！{{ $girl->name}}さん<br>{{ $year - $girl->year }}歳の誕生日、おめでとうございます。</a></h3>
			<div class="content"><img data-src="holder.js/740x448/text:thumbnail"></div>
			<div class="content girllink">
			<a href="/dmm/girl/{{ $girl->name }}" class="bg-white place-right girllink">もっと見る</a>
			</div>

			@if ($thumbnail = array_get($girl->dmms(), 0))
			@include('dmm.thumbnail', array('thumbnail' => $thumbnail))
			@endif

    		@include('girl.banner')
		</div>
	@endforeach
</div>
</div>
@endsection