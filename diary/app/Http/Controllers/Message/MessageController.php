<?php namespace App\Http\Controllers\Message;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;

use App\Message;
class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * This function save a new post in the database
	 *
	 * @return Response
	 */
	public function store( Request $request)
	{
		/* Here we ask if is a ajax request */
		if ($request->ajax()){
			
			/* Here we get the last position text on the browser */
			$lastMessage= $this->getLastPost($request->id_usuario);
			
			/*Here we create a new message */
			$message = new Message($request->all());
			
			/*Here we know if there are other message firt */
			if($lastMessage != null){
				if($lastMessage->position == "left"){
					$message->position = "rigth";
				}else{
					$message->position = "left";
				}
			}else{
				$message->position ="left";
			}

			/*Here we get the large date when the post was created*/
			$message->create_date = $this->todayDate();

			$message->save();
		
			return json_encode($message);	
		}
	}

	/**
	 * Show the user´s messages
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request)
	{
		/* Here we ask if is a ajax request */
		if ($request->ajax()){

			/* Here we get all the messages that teh user has posted */
			$messages = Message::where('id_usuario',$request->id_usuario)->get();
            return json_encode($messages);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, Request $request)
	{

	}

	/**
	 * This function update a post
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		/* Here we ask if is a ajax request */
		if ($request->ajax()){

			/* Here we get the message that the user wants to update */
			$message = Message::findOrFail($request->id);
			$message->fill($request->all());
            $message->save();
            return json_encode($message);
		 }
	}

	/**
	 * This function delete a post
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		/* Here we ask if is a ajax request */
		if ($request->ajax()){
			
			/* Here we get the message that the user wants to delete */
			$message = Message::find($id);

			$message->delete();
			
            return json_encode($message);
		 }
	}


	/**
	 * This function get the last post that the user has posted
	 *
	 * @param  int  $id
	 * @return messages
	 */
	public function getLastPost($id){

		/* Here we get all message */
		$messages  = Message::where('id_usuario', $id)->get();
		
		/* we ask here if there are any message */
		if(empty($messages[0])) {
			$messages = null;

		}else{
			$messages = $messages->last();
		}
		
		return  $messages;
    }

	/**
	 * This function get the actual date 
	 * @return fecha
	 */
	public function todayDate(){
		
		$fecha = date('Y-m-j');
		$fecha_actual = strtotime ( '-6 hour' , strtotime ( $fecha ) ) ;
		$fecha_actual = date ( 'Y-m-j' , $fecha_actual);

		$dias = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
		$meses = array("January","February","March","April","May","June","July","August","September","October","November","December");
		 
		$date = (date($fecha_actual));

		$diaSemana = date("N", strtotime($date))-1; 
		
		list($anio, $mes, $dia) = explode("-",$date); 

		$fecha = $dias[$diaSemana].", ".$meses[$mes-1]." ".$dia.", ".$anio;

		return $fecha;	
	}
}
