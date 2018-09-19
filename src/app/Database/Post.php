<?php

namespace App\Database;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

  protected $table = 'posts';
  protected $fillable = ['id', 'title', 'userId', 'body'];
  public $timestamps = false;
  //
}
