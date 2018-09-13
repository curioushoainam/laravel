@foreach($news as $item)
	{{ $item->id .'. '. $item->TieuDe }}
	<br>	

@endforeach

{!! $news->links()!!}