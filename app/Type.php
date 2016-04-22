<?php

namespace PanamaBudget;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
		'description'
    ];
}
