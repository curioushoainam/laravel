@extends('layouts.mainlayout')

@section('contents')
<h5>laravel</h5>

<?= $course ?>

<br>
{{$course}}  {{-- DO NOT compile html code --}}

<br>
{!!$course!!}

@endsection