<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Database\Post;
use App\Database\Comment;

class PostsController extends Controller
{
  public function get()
  {

    $post = new Post;
    $posts = $post::all();

    return $this->render('posts', ['posts' => $posts]);
  }

  public function getSingle($id) {
    $postModel = new Post;
    $post = $postModel::where(['id' => $id])->first();

    $commentModel = new Comment;
    $comments = $commentModel::where(['postId' => $post->id])->get();

    return $this->render('post', ['post' => $post, 'comments' => $comments]);
  }
}
