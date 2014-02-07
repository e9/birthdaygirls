<h2 class="grid_10 prefix_1 suffix_1">{{ $girl->month }}月{{ $girl->day }}日生まれの{{ $girl->name }}さん</h2>

<div class="grid_10 prefix_1 suffix_1">
	<div class="grid_8 alpha">
		@foreach ($girl->movies() as $i => $movie)
			<p><script src="http://static.fc2.com/video/js/outerplayer.min.js" url="{{ $movie->url }}" w="620" h="380" charset="UTF-8"></script></p>
			@if (($i % 2) == 1)
				<p class="banner"><img data-src="holder.js/600x80"></p>
			@endif
		@endforeach
	</div>

	<div class="grid_2 omega">
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
		<p><img data-src="holder.js/140x140"></p>
	</div>
</div>
