<?php

namespace App\Models;


use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    use ValidatingTrait;

	protected $rules = [
	];
}
