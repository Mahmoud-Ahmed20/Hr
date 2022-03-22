<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

	protected $table = 'admins';
	public $timestamps = true;
	protected $fillable = array('name', 'email', 'password', 'photo', 'phone', 'is_activate', 'archive');

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

	public function scopeNotArchive($query){
		return $query->where('archive', 0);
	}

}
