<!-- if there is error : TokenMismatchException -->
<!-- You can solve by going to app\http\kernal.php, here you can see the line \App\Http\Middleware\VerifyCsrfToken::class then hide or delete the line. -->

<form action="{{route('postDemo')}}" method="post">
	<input type="text" name="txtname">
	<input type="submit">
</form>

