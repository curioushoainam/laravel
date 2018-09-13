@if(Auth::check()) 

	<h2>login successfully :)</h2>
	@if( isset($user) && $user)
		{{'Username : ' . $user->name}}
		<br>
		{{'Email : ' . $user->email}}
		<br>
		<a href="{{url('logout')}}">Logout</a>
	@endif

@else
	<h2>You don't login yet !</h2>

@endif