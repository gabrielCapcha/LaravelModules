<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plugins extends Model {
    protected $connection = 'mysql';
    
	const TABLE_NAME      = 'plugins';
	const STATE_ACTIVE    = true;
	const STATE_INACTIVE  = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		//Table Rows
		'id', 'name','description','url', 'installed',
		//Audit
		'flag_active', 'updated_at', 'deleted_at',
        'created_at'
	];

	/**
	 * Casting of attributes
	 *
	 * @var array
	 */
	protected $casts = [
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $table = self::TABLE_NAME;    
}
