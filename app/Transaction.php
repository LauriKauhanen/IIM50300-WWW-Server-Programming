<?php namespace PanamaBudget;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
		'id',
		'user_id',
		'description',
		'date',
		'amount',
		'type'
    ];
	
	protected $hidden = [
		'created_at',
		'updated_at'
	];
}
