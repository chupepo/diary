<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'message';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','position','message','estado','id_usuario','create_date'];
}