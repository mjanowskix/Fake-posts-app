<?php

namespace App\Database;
use Illuminate\Database\Eloquent\Model;

class User extends Model {

  protected $table = 'users';
  protected $fillable = ['id', 'name', 'email', 'username'];
  public $timestamps = false;

  //
}
