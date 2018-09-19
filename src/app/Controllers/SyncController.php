<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Database\Post;
use App\Database\User;
use App\Database\Comment;
use App\Lib\FakeAPI;

class SyncController extends Controller
{
  public function get() {
    $posts = $this->syncPosts();
    $users = $this->syncUsers();
    $comments = $this->syncComments();

    return $this->render('synchronize', [
      'posts' => $posts,
      'users' => $users,
      'comments' => $comments
    ]);
  }

  public function syncPosts() {
    $postModel = new Post;
    $posts = $postModel::all();

    $fakeAPI = new FakeAPI;
    $postsOrigin = $fakeAPI->getPosts();
    $added = 0;
    foreach($postsOrigin as $post) {
      if(!$postModel::where(['id' => $post->id])->get()->count()) {
        $postModel::create(['id' => $post->id, 'title' => $post->title, 'body' => $post->body, 'userId' => $post->userId ]);
        $added++;
      }
    }
    return $added;
  }

  public function syncUsers() {
    $userModel = new User;
    $users = $userModel::all();

    $fakeAPI = new FakeAPI;
    $usersOrigin = $fakeAPI->getUsers();
    $added = 0;
    foreach($usersOrigin as $user) {
      if(!$userModel::where(['id' => $user->id])->get()->count()) {
        $userModel::create(['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'username' => $user->username ]);
        $added++;
      }
    }
    return $added;
  }

  public function syncComments() {
    $commentModel = new Comment;
    $comments = $commentModel::all();

    $fakeAPI = new FakeAPI;
    $commentsOrigin = $fakeAPI->getComments();
    $added = 0;
    foreach($commentsOrigin as $comment) {
      if(!$commentModel::where(['id' => $comment->id])->get()->count()) {
        $commentModel::create(['id' => $comment->id, 'postId' => $comment->postId, 'email' => $comment->email, 'name' => $comment->name, 'body' => $comment->body ]);
        $added++;
      }
    }
    return $added;
  }

}
