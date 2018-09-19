<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Database\User;
use App\Lib\FakeAPI;

class UsersController extends Controller
{
  public function get()
  {
    $userModel = new User;
    $users = $userModel::all();

    return $this->render('users', ['users' => $users]);
  }

  public function getSingle($id) {
    $userModel = new User;
    $user = $userModel::where(['id' => $id])->first();

    return $this->render('user', ['user' => $user]);
  }
}
