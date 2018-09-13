<h3>{{$error or ''}}</h3>
<br>

<form action="{{route('login')}}" method="post">
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password"> 
	<input type="submit">
</form>