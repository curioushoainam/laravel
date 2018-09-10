<!-- error : MethodNotAllowedHttpException -->


<form action="{{route('files.upload')}}" method="post" enctype="multipart/form-data"> 
	<input type="file" name="myFile" id="myFile">
	<input type="submit">
</form>