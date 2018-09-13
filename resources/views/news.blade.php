<style>
.pagination li {
	float: left;
	list-style: none;
	margin-left: 5px;
}

</style>


@foreach($news as $item)
	{{ $item->id .'. '. $item->TieuDe }}
	<br>	

@endforeach

{{-- {!! $news->links()!!} --}}

{{-- {!! $news->appends(['writer'=>'hnhd'])->links() !!} 	 --}}
{{-- ?writer=hnhd&page=4 --}}

{!! $news->fragment('vhd')->links() !!} 	
