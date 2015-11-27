

<link rel="stylesheet" type="text/css" href="{{ asset('/css/message/editPost.css') }}">

<div class="container">
  <div class="editpost">    
    {!! Form::open(array('url' => '/updatePost','role'=>'form','method' => 'POST','id'=>'txt-update-post','class'=>'form-horizontal')) !!}
      <div class="form-group">
        <label for="comment"><h1>Edit comment</h1></label>
        <input type="hidden" name="id" id="id_Post">
        <textarea class="form-control message-posted comment2" rows="12" name="message"id="comment2"></textarea>
        
      </div>
    {!! Form::close() !!}
    <div class="row">
        <div class="col-md-0 text-left">
          <br />
          <button class="btn btn-primary" onclick="updatePost()" id="bt_login">Edit</button>
          <button class="btn" id="bt_edit_close" href="#">Cancel</button>
      </div>
    </div>
  </div>
</div>
