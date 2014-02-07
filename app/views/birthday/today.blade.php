<h2 class="grid_10 prefix_1 suffix_1">{{ $month }}月{{ $day }}日生まれの{{ count($girls) }}人のバースデーガールたち</h2>

@foreach ($girls as $girl)
<div class="grid_10 prefix_1 suffix_1">
	<h3><a href="girl/{{ $girl->name }}">ハッピーバースデー！{{ $girl->name}}さん<br>{{ $year - $girl->year }}歳の誕生日、おめでとうございます。</a></h3>

	<div class="grid_8 alpha">
		@if ($movie = $girl->movies()[0])
		<p><script src="http://static.fc2.com/video/js/outerplayer.min.js" url="{{ $movie->url }}" w="620" h="380" charset="UTF-8"></script></p>
		@endif
		@if ($movie = $girl->movies()[1])
		<div class="grid_4 alpha"><script src="http://static.fc2.com/video/js/outerplayer.min.js" url="{{ $movie->url }}" w="300" h="200" charset="UTF-8"></script></div>
		@endif
		@if ($movie = $girl->movies()[2])
		<div class="grid_4 alpha"><script src="http://static.fc2.com/video/js/outerplayer.min.js" url="{{ $movie->url }}" w="300" h="200" charset="UTF-8"></script></div>
		@endif
	</div>

	<div class="grid_2 omega">
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
	</div>

	<p class="banner"><img data-src="holder.js/600x80"></p>
</div>

@endforeach
