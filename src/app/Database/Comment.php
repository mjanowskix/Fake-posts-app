<?php

namespace App\Database;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

  protected $table = 'comments';
  protected $fillable = ['id', 'postId', 'name', 'email', 'body'];
  public $timestamps = false;
  //
}
