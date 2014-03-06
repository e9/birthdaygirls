@extends('layouts.master')

@section('content')
<div class="row">
<h2 class="offset1 span10 bg-lightPink fg-white" style="position: relative;">
ハッピーバースデー！{{ $girl->name}}さん
<div class="place-right" style="position: absolute; right: 5px; top: 0;">@include('girl.social')</div>
</h2>
</div>

<div class="row">
<div class="offset1 span10 bg-lightPink">
	<div class="section">
		<h3 class="bg-white">ハッピーバースデー！{{ $girl->name}}さん<br>{{ $year - $girl->year }}歳の誕生日、おめでとうございます。</h3>
		<img src="holder.js/740x448/text:ジャケ写">
		@include('girl.banner')
	</div>
</div>
</div>
@endsection