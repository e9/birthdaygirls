<h1>{{ $month }}月{{ $day }}日</h1>
<ul>
	@foreach ($girls as $girl)
	    <li>{{ link_to("girl/{$girl->name}", $girl->name) }}</a></li>
	@endforeach
</ul>
