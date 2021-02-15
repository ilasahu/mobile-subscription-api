<?php

namespace App\Models;


use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Device extends Model
{
    use HasApiTokens;
    use HasFactory;
    use ValidatingTrait;

    protected $fillable = ['uId', 'appId', 'language', 'os'];

	protected $rules = [
        'uId' => 'required',
        'appId' => 'required',
	];
}
