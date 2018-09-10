@extends('layouts.mainlayout')

@section('contents')
<h5>PHP</h5>

<?= $course ?>

<br>
{{$course}}  {{-- DO NOT compile html code --}}

<br>
{!!$course!!}

@endsection