<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    protected $connection = 'mysql';
    
	const TABLE_NAME      = 'com_companies';
	const STATE_ACTIVE    = true;
	const STATE_INACTIVE  = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		//Table Rows
		'id', 'company_name','company_ruc','address','flag_a4_document', 'flag_report',
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
