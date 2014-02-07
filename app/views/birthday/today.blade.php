<h2 class="grid_10 prefix_1 suffix_1">{{ $month }}月{{ $day }}日生まれの{{ count($girls) }}人のバースデーガールたち</h2>

@foreach ($girls as $girl)
<div class="grid_10 prefix_1 suffix_1">
	<h3><a href="girl/{{ $girl->name }}">ハッピーバースデー！{{ $girl->name}}さん<br>{{ $year - $girl->year }}歳の誕生日、おめでとうございます。</a></h3>

	<div class="grid_8 alpha">
		<p><img data-src="holder.js/620x400"></p>
		<div class="grid_4 alpha"><img data-src="holder.js/300x200"></div>
		<div class="grid_4 omega"><img data-src="holder.js/300x200"></div>
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
