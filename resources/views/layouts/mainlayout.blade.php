<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Demo</title>

    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    {{-- asset function defaully has public path to public folder --}}
</head>
<body>
	@include('layouts/header')

	<div id="contents">
		<h3>MAIN LAYOUT</h3>	
		@yield('contents')

	</div>
	
	@include('layouts/footer')    
</body>
</html>
