<?php namespace App\Http\Controllers;
use App\User;
use Session;
use Auth;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = $this->getMessages();
		return view('home',compact('messages'));
	}

	/*
	|--------------------------------------------------------------------------------
	|  Función que retorna a todos los usuarios
	|--------------------------------------------------------------------------------
	*/
	public function getMessages()
	{
		$message = \DB::table('message')
				->where('id_usuario',Auth::user()->id)
				->orderBy('id','DSC')
				->paginate(7);

		return $message;
	}

}
