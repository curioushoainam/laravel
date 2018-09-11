@extends('layouts.mainlayout')

@section('contents')
<h5>laravel</h5>

<br>
{{-- {{$course}}  DO NOT compile html code --}}
<br>
{{-- {!!$course!!} --}}

@if(@isset($course))
	{!!$course!!}

@else
	{{'Không tồn tại $course!'}}

@endif

<br>
{!!'3 persons => '!!}{!!$course or 'Không tồn tại $course!'!!}

<br>
@for($i=0; $i<5; $i++)
	@php($i2 = $i*2)	
	<li>{{$i2}}</li>
	
	@php($i3 = $i*3)
	<li>{{$i3}}</li>
	
@endfor
@endsection