$(document).ready(function () {
    
    
    /* This function show the Pop-up when a user wants to create a new post */
    $("#post").click(function (e) {
        e.preventDefault();
	    $('.post').bPopup({
	        follow: [true, true],
	    });      
    });

    /* This function close the Pop-up when a user select a cancel button */
    $("#bt_cerrar").click(function () {
        $('#comment').val('');
        $('.post').bPopup().close();
    });

 	/* This function close the form when a user doesn´t want to edit the post */
    $("#bt_edit_close").click(function () {

        $('.editpost').bPopup().close();
    });

    
 });

/* This function create and save new post and show it on the browser */
function newPost(){

	var form = $('#txt-new-post');

	var url = form.attr('action');
	
	var data = form.serialize();

	$.post(url,data, function(result){
	
		var message = JSON.parse(result);

		var info = '';
		if(message['position'] == "rigth"){

			info += '<li class="timeline-inverted '+message['id']+'">';
			$('.position').val('left');
		}else{
			info += '<li  class='+message['id']+'>';
			$('.position').val('rigth');
		}
		
		info += '<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>';
        info += '<div class="timeline-panel">';
        info +=	'<div class="timeline-heading">';
        info +=  '<h3 class="timeline-title"><p><middle class="text-muted"><i class="glyphicon glyphicon-time"></i> '+message['create_date']+'</p></h3>';
        info +=	'</div>';
        info += '<div class="timeline-body">';
        info +=  '<p id="'+message['id']+'">'+message['message']+'</p>';

		info +=  '	<br />';
        info +=  '    <button class="btn btn-info" onclick="editarPost('+message['id']+')">Edit</button>';
        info +=  '    <button class="btn btn-danger" id="delete"onclick="eliminarPost('+message['id']+')">Delete</button>';
        info +='</div>';
        info +='</div>';
       	
       	info += '</li>';

       	$("#comment3").val('');
       	$(".timeline").html(info + $(".timeline").html());
       	$('.no-message').hide('');
        $('.post').bPopup().close();
	});
}

/* This function show a Pop-up with a form that has all the information that the user wants to edit */
function editarPost(id){
	
	var form = $('#txt-edit-post');

	var url = form.attr('action');
		url += "/"+id;

	var data = form.serialize();

	$.post(url,data, function(result){
		
		var message = JSON.parse(result);

		$(".message-posted").val(message[0]["message"]);
		$("#id_Post").val(message[0]["id"]);
		
		 $('.editpost').bPopup({
		           follow: [true, true], 
		       }); 

	});
}

/* This function edit a post that the user selected and update the post on the browser  */
function updatePost(){
	
	var form = $('#txt-update-post');
	var url = form.attr('action');

	var data = form.serialize();

	$.post(url,data, function(result){

        /*Se convierte la variable result en un objeto Json */
		var message = JSON.parse(result);

		$("#"+message["id"]).html(message["message"]);
		$('.editpost').bPopup().close();
	});
}

/* This function delete a post that the user selected and update the browser */
function eliminarPost(id){
	
	answer = confirm('Do you really want to delete this post?')
	
	if (answer){
    
		var form = $('#txt-eliminar-post');

		var url = form.attr('action');
			url += "/"+id;
		
		var data = form.serialize();

		$.post(url,data, function(result){
			
			var message = JSON.parse(result);
			$("."+message["id"]).remove();
		});
	}

}