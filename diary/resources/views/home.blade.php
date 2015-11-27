@extends('app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/home/home.css') }}">

@include('message.message')
@include('message.editMessage')

<div class="container">
  <input type="hidden" class="position" value="left">
  
  {!! Form::open(array('url' => '/showPost','role'=>'form','method' => 'POST','id'=>'txt-show-post','class'=>'form-horizontal')) !!}
    <input type="hidden" name="id_usuario" value="{{Auth::user()->id}}">
  {!! Form::close() !!}
   
    <div class="page-header">
    	<div class="content-timeline">
    		<div><h1 id="timeline">Timeline</h1></div>
    		<div><h1 id="post"><a href="">New Post</a></h1></div>
    	</div>
    </div>
    <div>
      <?php echo $messages->render(); ?>
    </div>
    
    <div class="all-messages">
    
      {!! Form::open(array('url' => '/editPost','role'=>'form','method' => 'POST','id'=>'txt-edit-post','class'=>'form-horizontal')) !!}
      {!! Form::close() !!}  
      {!! Form::open(array('url' => '/deletPost','role'=>'form','method' => 'POST','id'=>'txt-eliminar-post','class'=>'form-horizontal')) !!}
      {!! Form::close() !!}  
      
      <ul class="timeline">
          @if ($messages[0] == null)
            <div class='no-message'>
              <label><h3>No existen mensajes en este momento</h3></label><br/>
            </div>
          @else
            <?php foreach ($messages as $message): ?>

              @if ($message->position == "left")
                <li class="{{$message->id}}">
              @else
                <li class="timeline-inverted {{$message->id}}">
              @endif
                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h3 class="timeline-title"><p><middle class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$message->create_date}}</middle></p></h3>
                    </div>
                    <div class="timeline-body">
                      <p id="{{$message->id}}">{{$message->message}}</p>
                      <br />
                      <button class="btn btn-info" onclick="editarPost({{$message->id}})">Edit</button>
                      <button class="btn btn-danger" id="delete"onclick="eliminarPost({{$message->id}})">Delete</button>
                    </div>
                  </div>
                
            </li>
            <?php endforeach; ?>
            <?php echo $messages->render(); ?>
          @endif
      </ul>
    </div>
</div>
<script type="text/javascript" src="{{ asset('/js/home/message.js') }}" ></script>

@endsection