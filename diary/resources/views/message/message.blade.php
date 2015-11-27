<div class="post">		
	{!! Form::open(array('url' => '/addPost','role'=>'form','method' => 'POST','id'=>'txt-new-post','class'=>'form-horizontal')) !!}
		<div>
			<input type="hidden" name="id_usuario" value="{{Auth::user()->id}}">
		</div>
		<div class="form-group">
			<label for="comment"><h1>Comment´s day:</h1></label>
			<textarea class="form-control" rows="8" name="message"id="comment3"></textarea>
		</div>
	{!! Form::close() !!}
	<div class="row">
	    <div class="col-md-12 text-left">
			<br />
			<button class="btn btn-primary" onclick="newPost()" id="bt_login">Post</button>
			<a class="btn" id="bt_cerrar" onclick="cancel()">Cancel</a>
		</div>
	</div>
</div>

