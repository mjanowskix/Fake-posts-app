<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Database\Post;
use App\Database\Comment;
use App\Database\User;

class HomeController extends Controller {

  public function get() {

    $post = new Post;
    $commentModel = new Comment;
    $userModel = new User;

    $posts = $post::limit(6)
                  ->orderBy('id')
                  ->get();


    $bestPosts = $commentModel::select('comments.postId', 'posts.*')
                              ->groupBy('comments.postId')
                              ->orderByRaw('COUNT(*) DESC')
                              ->join('posts', 'comments.postId', '=', 'posts.id')
                              ->limit(10)
                              ->get();
    /** TO FIX **/
    // $bestUsers = $commentModel::select('comments.email', 'users.*')
    //                           ->groupBy('comments.email')
    //                           ->orderByRaw('COUNT(*) DESC')
    //                           ->join('users', 'comments.email', '=', 'users.email')
    //                           ->limit(10)
    //                           ->get();
    $bestUsers = [];
    return $this->render('home', ['posts' => $posts, 'bestusers' => $bestUsers, 'bestposts' => $bestPosts]);
  }
}
